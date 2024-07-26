<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\Payment;
use App\Models\Enrollment;
use Illuminate\View\View;
class PaymentController extends Controller
{
    public function index(){
        $payments=Payment::all();
        return view('payments.index')->with('payments',$payments);
    }  
     public function create(): View
    {
        $enrollments = Enrollment::all();
        return view('payments.create', compact('enrollments'));
    }

    public function store(Request $request)
    {
        $input = $request->all();
        Payment::create($input);
        return redirect('payments')->with('flash_message','Payment Added');
    }
    public function show(string $id): View
    {
        $payments= Payment::findorFail($id);
        return view('payments.show')->with('payments',$payments);
    }
    public function edit(string $id)
    {
        $payment = Payment::findOrFail($id);
        $enrollments = Enrollment::all();
        return view('payments.edit', compact('payment', 'enrollments'));
    }
    public function update(Request $request, string $id): RedirectResponse
    {
        $payment = Payment::findOrFail($id);
        $input = $request->all();
        $payment->update($input);
        return redirect()->route('payments.show', $payment->id)->with('flash_message', 'Payment Updated');
    }
    public function destroy(string $id)
    {
        Payment::destroy($id);
        return redirect('payments')->with('flash_message','Payment deleted');
    } 
}
