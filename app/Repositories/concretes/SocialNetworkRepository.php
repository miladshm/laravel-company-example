<?php


namespace App\Repositories\concretes;


use App\Models\SocialNetwork;
use Illuminate\Database\Eloquent\Model;

class SocialNetworkRepository extends \App\Repositories\Repository
{

    function model(): Model
    {
        return new SocialNetwork();
    }
}
