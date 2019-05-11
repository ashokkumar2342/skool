<?php

namespace App\Model\Library;

use Illuminate\Database\Eloquent\Model;

class BookIssueDetails extends Model
{
     public function librarymembertype()
    {
    	return $this->hasOne('App\Model\Library\LibraryMemberType','id','member_ship_type_id');
    } 
     public function bookaccession()
    {
    	return $this->hasOne('App\Model\Library\BookAccession','id','accession_no');
    }
    public function ticketdetails()
    {
    	return $this->hasOne('App\Model\Library\TicketDetails','id','no_of_ticket');
    } 
}
