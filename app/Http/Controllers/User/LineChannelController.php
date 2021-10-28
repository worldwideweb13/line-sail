<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\LineChannel;
use Illuminate\Http\Request;
use App\Http\Requests\User\LineChannelRequest;
use Illuminate\Support\Facades\Auth;

class LineChannelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lineChannels = LineChannel::orderBy('created_at', 'asc')->paginate(5);
        return view('pages.user.line_channel.channels_index', [
            'lineChannels' => $lineChannels
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.user.line_channel.channels_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LineChannelRequest $request)
    {
        $lineChannel = new LineChannel;
        $lineChannel->line_channel_name = $request->channelName;
        $lineChannel->line_channel_secret = $request->channelSecret;
        $lineChannel->line_access_token = $request->channelAccessToken;
        $lineChannel->user_id = Auth::id();
        $lineChannel->save();

        return redirect()->route('user.home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(LineChannel $lineChannel)
    {
        return view('pages.user.line_channel.channels_edit', ['lineChannel' => $lineChannel]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(LineChannelRequest $request, LineChannel $lineChannel)
    {
        $lineChannel->line_channel_name = $request->line_channel_name;
        $lineChannel->line_access_token = $request->line_access_token;
        $lineChannel->line_channel_secret = $request->line_channel_secret;
        $lineChannel->save();

        return redirect()->route('user.lineChannel.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(LineChannel $lineChannel)
    {
        $lineChannel->delete();
        return back();
    }
}