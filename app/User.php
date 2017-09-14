<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];




    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getNewMessage () {
        $messages = Message::where('fk_user', $this->id)->where('read',false)->get();
        return count($messages) === 0 ? '': count($messages);
    }

    public function mesMessages() {
        $messages = Message::where('fk_user', $this->id)->orderBy('created_at', 'desc')->get();
        foreach ( $messages as $message ) {
            $message->read=true;
            $message->save();
        }
        return view('inbox', ['messages' => $messages]);
    }

    public function mesAnnonces() {
        $annonces = Annonce::where('fk_auteur', $this->id)->orderBy('created_at', 'desc')->get();
        return view('index', ['annonces' => $annonces, 'mesAnnonces' => true ]);
    }    


}
