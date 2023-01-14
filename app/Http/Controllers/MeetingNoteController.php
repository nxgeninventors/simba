<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMeetingNoteRequest;
use App\Http\Requests\UpdateMeetingNoteRequest;
use App\Models\MeetingNote;

class MeetingNoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMeetingNoteRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMeetingNoteRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MeetingNote  $meetingNote
     * @return \Illuminate\Http\Response
     */
    public function show(MeetingNote $meetingNote)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MeetingNote  $meetingNote
     * @return \Illuminate\Http\Response
     */
    public function edit(MeetingNote $meetingNote)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMeetingNoteRequest  $request
     * @param  \App\Models\MeetingNote  $meetingNote
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMeetingNoteRequest $request, MeetingNote $meetingNote)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MeetingNote  $meetingNote
     * @return \Illuminate\Http\Response
     */
    public function destroy(MeetingNote $meetingNote)
    {
        //
    }
}
