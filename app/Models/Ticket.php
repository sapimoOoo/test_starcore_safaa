<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    public function ticketType() {
    return $this->belongsTo(TicketType::class);
}

public function project() {
    return $this->belongsTo(Project::class);
}
}