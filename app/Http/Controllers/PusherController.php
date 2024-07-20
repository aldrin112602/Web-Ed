<?php

namespace App\Http\Controllers;

use App\Events\PusherBroadcast;
use Illuminate\Http\Request;

class PusherController extends Controller
{
    public function index() {
        return view('admin.message.index');
    }

    public function broadcast(Request $request) {
        broadcast(new PusherBroadcast($request->get('message')))->toOthers();
        return view('admin.message.broadcast', ['message', $request->get('message')]);
    }

    public function receive(Request $request) {
        return view('admin.message.receive', ['message', $request->get('message')]);
    }
}
