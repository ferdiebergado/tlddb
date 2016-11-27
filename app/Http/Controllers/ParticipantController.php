<?php

namespace App\Http\Controllers;

use App\Participant;
use App\Region;
use App\Division;
use App\Transaction;
use App\Event;
use App\Designation;
use App\User;
use App\LearningArea;
use App\Language;
use App\ParticipantType;
use App\Login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use PDF;

class ParticipantController extends Controller
{
	private function showRegions () {
		$regions = Region::orderBy('RegID','asc')->get();
		return $regions;
	}

	private function showDivisions ($reg_id) {
		$divisions = Division::where('RegID','=',$reg_id)->get();
		return $divisions;
	}

	private function showGenders () {
		$genders = array("0" => "[Unspecified]", "M" => "Male", "F" => "Female");	
		return $genders;
	}

	private function showDesignations () {
		$designations = Designation::orderBy('DesName','asc')->get();
		return $designations;
	}

	private function showLearningAreas () {
		$learningareas = LearningArea::orderBy('LAName','asc')->get();
		return $learningareas;
	}

	private function showLanguages () {
		$languages = Language::orderBy('LanguageName','asc')->get();
		return $languages;
	}

	private function showPaxTypes () {
		$participanttypes = ParticipantType::orderBy('PTName','asc')->get();
		return $participanttypes;
	}

	public function showTransactions ($pid) {
		$transactions = Transaction::where('PIN','=',$pid)->orderBy('EventID','desc')->get();
		return $transactions;
	}

	private function createTransaction(Request $request,$pin) {

		$transaction = new Transaction;
		$transaction->EventID = $this->showEventId();
		$transaction->PIN = $pin;
		$transaction->LAID = $request->learningarea;
		$transaction->LID = $request->language;
		$transaction->PTID = $request->participanttype;
		$transaction->UserID = Auth::user()->id;			
		$transaction->save();
		return $message = 'Saved successfully.';
	}

	private function showEventId() {

		$currentdate = Carbon::today()->toDateString();
		//$currentdate = Carbon::create(2016,10,26);
		// $user = User::find(Auth::user()->id);
		//$user = User::find(1);
		
		//$eventid = 45;

		$eventid = Event::where([
			['StartDate','<=', $currentdate],
			['EndDate', '>=', $currentdate]
			])->value('EventID');

		return $eventid;
	}

	private function showEvents() {
		$events = Event::orderBy('id','desc')->get();
		return $events;
	}

	public function getSearch(Request $request) {

		$events = $this->showEvents();

		$participants = Participant::where('LastName','like',"%$request->searchitem%")->orWhere('FirstName','like',"%$request->searchitem%")->orderBy('LastName','asc')->paginate(10);

		$eventid = '*';

		$participants->setPath("?searchitem=$request->searchitem");

		return view('dashboard', ['participants' => $participants, 'events' => $events, 'eventid' => $eventid]);

	}

	public function getEvent(Request $request) {
		$events = $this->showEvents();
		$eventid = $request->event;
		$participants = Participant::whereHas('transactions', function ($query) use (&$eventid, &$user) {
			$query->where('EventID', '=', $eventid);
		})->orderBy('LastName','asc')->paginate(10);
		$participants->setPath("?event=$eventid");
		return view('dashboard', ['participants' => $participants, 'events' => $events, 'eventid' => $eventid]);
	}

	public function getDashboard(Request $request) {

		//$transactions = $user->transactions()->where('EventID','=',$eventid)->get();

		//$transactions = $transactions->participant->get();

		//$transactions = $transactions->values()->all();

		$events = $this->showEvents();		
		$eventid = $this->showEventId();

		//if (!empty($request->searchitem)) {
		//	$participants = Participant::where('LastName','like',"%$request->searchitem%")->orWhere('FirstName','like',"%$request->searchitem%")->paginate(10);
		//} else {

		$user = Auth::user()->id;

		$login = new Login;
		$login->UserID = $user;
		$login->IPAddress = $request->ip();
		$login->save();

		$participants = Participant::whereHas('transactions', function ($query) use (&$eventid, &$user) {
			$query->where('EventID', '=', $eventid)->where('UserID','=',$user);
		})->orderBy('LastName','asc')->paginate(10);		

		//}

		//$transactions = $user->transactions()->get();

		//$participants = Transaction::where([
		//	['EventID', '=', $eventid],
		//	['UserID', '=', Auth::user()->id]
		//	])->get();
		$message = '';

		return view('dashboard', ['participants' => $participants, 'events' => $events, 'eventid' => $eventid]);
	}

	public function getPaxForm(Request $request, $pagemode, $pid) {

		$regions = $this->showRegions();
		$genders = $this->showGenders();			
		$designations = $this->showDesignations();
		$learningareas = $this->showLearningAreas();
		$languages = $this->showLanguages();
		$participanttypes = $this->showPaxTypes();

		switch ($pagemode) {
			// ADD NEW PARTICIPANT
			case 1: 
			$pagetitle = 'New Participant';
			$participant = '';			
			$divisions = $this->showDivisions('*');
			$transactions = '';
			break;
			// ADD EXISTING PARTICIPANT
			case 2:
			$pagetitle = 'Add Existing Participant';				
			$participant = Participant::where('PIN','=',$pid)->first();
			$divisions = $this->showDivisions($participant->region->RegID);
			$transactions = $this->showTransactions($pid);
			break;
			// VIEW/EDIT PARTICIPANT INFO
			case 3:
			$pagemode = 3;
			$pagetitle = 'Participant Details';
			$participant = Participant::where('PIN','=',$pid)->first();
			$divisions = $this->showDivisions($participant->region->RegID);
			$transactions = $this->showTransactions($pid);			
			break;
			default:
				# code...
			break;
		}
		return view('paxform', ['regions' => $regions, 'genders' => $genders, 'designations' => $designations, 'learningareas' => $learningareas, 'languages' => $languages, 'participanttypes' => $participanttypes, 'pagetitle' => $pagetitle, 'pagemode' => $pagemode, 'participant' => $participant, 'divisions' => $divisions, 'transactions' => $transactions]);
	}

	public function postSaveData(Request $request) {

		$this->validate($request, [
			'lastname' => 'required', 
			'firstname' => 'required', 
			'email' => 'email'
			]);

		switch ($request->pagemode) {

			// SAVE NEW PAX
			case 1:
			$participant = new Participant;

			$PIN = Participant::orderBy('PIN','desc')->first();

			if (is_null($PIN)) {
				$participant->PIN = 1;
			}
			else {
				$participant->PIN = $PIN->PIN + 1;
			}		

			$participant->LastName = $request['lastname'];
			$participant->FirstName = $request['firstname'];		
			$participant->MI = $request['MI'];
			$participant->Gender = $request['gender'];
			$participant->DesID = $request['designation'];
			$participant->RegID = $request['region'];
			$participant->DivID = $request['division'];
			$participant->Station = $request['station'];
			$participant->District = $request['district'];
			$participant->EmpNo = $request['empno'];
			$participant->Mobile = $request['mobileno'];
			$participant->TelNo = $request['telno'];
			$participant->Email = $request['email'];			
			$participant->IsELLNRegCoord = 1;
			$participant->IsLanguageCoord = 1;
			$participant->UserID = Auth::user()->id;

			$message = 'There was an error.  Please try again.';

			try {
			//$id = Participant::insertGetID($participant);			
				if ($participant->save()) {
					$message = $this->createTransaction($request,$participant->PIN);			
				}
				return redirect()->route('dashboard')->with(['message' => $message]);
			}
			catch(Exception $e) {
				$message = $e->getMessage();
				return redirect(url('paxform')/pagemode/1/pid/0)->with(['message' => $message]);		
			}
			break;

			// UPDATE PAX
			case 2:
			
			default:
				# code...
			break;
		}		
	}

	public function startDownload (Request $request, $eventid) {

		$event = Event::where('id','=',$eventid)->first();

		$participants = Participant::whereHas('transactions', function ($query) use (&$eventid) {
			$query->where('EventID', '=', $eventid);
		})->orderBy('LastName','asc')->get();		

		$pdf = PDF::loadView('layouts.directory', compact('participants'), compact('event'));
		return $pdf->stream('directory.pdf');			
	}

	public function getUpdatedDivisions (Request $request) {

		$region_id = $request->region_id;

		$divisions = Division::select('DivID', 'DivName')->where('RegID','=',$region_id)->orderBy('DivName','asc')->get();	
		return $divisions;
	}
}