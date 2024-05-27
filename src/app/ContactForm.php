<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactForm extends Model
{
    //テーブル名を誤ったため変更
    protected $table = 'contactforms';

    //created_at列とupdated_at列は作っていない為timestampsを切る
    public $timestamps = false;
}
