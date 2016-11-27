<?php
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App{
/**
 * App\Participant
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Transaction[] $transactions
 */
	class Participant extends \Eloquent {}
}

namespace App{
/**
 * App\Event
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Transaction[] $transaction
 */
	class Event extends \Eloquent {}
}

namespace App{
/**
 * App\Language
 *
 */
	class Language extends \Eloquent {}
}

namespace App{
/**
 * App\User
 *
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $unreadNotifications
 */
	class User extends \Eloquent {}
}

namespace App{
/**
 * App\LearningArea
 *
 */
	class LearningArea extends \Eloquent {}
}

namespace App{
/**
 * App\Division
 *
 * @property-read \App\Region $region
 */
	class Division extends \Eloquent {}
}

namespace App{
/**
 * App\Region
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Division[] $divisions
 */
	class Region extends \Eloquent {}
}

namespace App{
/**
 * App\ParticipantType
 *
 */
	class ParticipantType extends \Eloquent {}
}

namespace App{
/**
 * App\Transaction
 *
 * @property-read \App\Participant $participant
 * @property-read \App\Event $event
 * @property-read \App\LearningArea $learning_area
 * @property-read \App\Language $language
 * @property-read \App\ParticipantType $participant_type
 */
	class Transaction extends \Eloquent {}
}

