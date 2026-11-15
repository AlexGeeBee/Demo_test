<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PaymentMethod;
use App\Models\Application;

class ApplicationController extends Controller {
    public function index() {
        $apps = auth()->user()->applications;
        return view('applications.index', ['applications' => $apps]);
    }

    public function create() {
        $payment_methods = PaymentMethod::pluck('name', 'id')->all();

        return view('applications.create', ['payment_methods' => $payment_methods]);
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'course' => 'required|string|max:50',
            'start_date' => 'required|date|after_or_equal:today',
            'payment_method' => 'required|integer|exists:payment_methods,id'
        ]);

        $app = new Application();
        $app->course = $validated['course'];
        $app->start_date = $validated['start_date'];
        $app->payment_method_id = $validated['payment_method'];
        $app->user_id = auth()->id();
        $app->save();

        return redirect('/applications')->with('success', 'Заявка успешно создана');
    }

    public function updateStatus(Request $request, int $id) {
        $validated = $request->validate(['status' => 'required|integer|exists:statuses,id']);
        $app = Application::findOrFail($id);
        $app->status_id = $validated['status'];
        $app->save();

        return redirect('/admin')->with('success', 'Статус заявки изменен');
    }
}