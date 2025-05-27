<?php

namespace App\Http\Controllers;

use App\Models\Ticket;  // IMPORT MODEL TICKET
use Illuminate\Http\Request;

class AdminTicketController extends Controller
{
    public function index()
    {
        $tickets = Ticket::with(['project', 'ticketType'])->latest()->get();

        return view('admin.tickets.index', compact('tickets'));
    }
}
