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
        return view('meeting-notes.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('meeting-notes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMeetingNoteRequest $request)
    {
        $meetingNote = new MeetingNote();
        $meetingNote->meeting_title = $request['meeting_title'];
        $meetingNote->meeting_notes = $request['meeting_notes'];
        $meetingNote->save();

        return redirect()->route('meeting-notes.index')->with('success', 'Meeting notes successfully created.');
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(MeetingNote $meetingNote)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(MeetingNote $meetingNote)
    {
        return view('meeting-notes.edit', compact('meetingNote'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMeetingNoteRequest $request, MeetingNote $meetingNote)
    {
        $meetingNote->update($request->all());

        return redirect()->route('meeting-notes.index')->with('success', 'Meeting notes successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(MeetingNote $meetingNote)
    {
        //
    }
}
