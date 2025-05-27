<?php

namespace App\Http\Controllers;  // PENTING: tambahkan ini

use App\Models\Ticket;
use App\Models\TicketType;
use App\Models\Project;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function create()
    {
        return view('tickets.create');
      
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'title' => 'required',
            'assign_at' => 'required|date',
            'ticket_type_id' => 'required|exists:ticket_types,id',
            'project_id' => 'required|exists:projects,id',
        ]);

        Ticket::create($request->all());

        return redirect('/ticket')->with('success', 'Tiket berhasil dikirim!');
    }
}
