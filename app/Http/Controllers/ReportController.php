<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
use App\Models\Transaction;
use Carbon\Carbon;


class ReportController extends Controller
{
    public function index()
    {
        $reports = Report::all();
        return view('report.index', compact('reports'));
    }

    public function create()
    {
        $currentDate = Carbon::now();
        $yearMonth = $currentDate->format('ymdhi');

        // Mendapatkan nomor urut terakhir untuk bulan ini
        $lastReprot = Report::where('reportNumber', 'like', 'REP' . $yearMonth . '%')->latest()->first();

        // Jika ada transaksi sebelumnya, tambahkan 1 ke nomor urutnya, jika tidak, mulai dari 1
        $sequence = $lastReprot ? intval(substr($lastReprot->reportNumber, -5)) + 1 : 1;

        // Format nomor urut
        $reportNumber = 'REP' . $yearMonth . sprintf('%03d', $sequence);
        // REP240615091752001
        return view('report.create', compact('reportNumber'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'reportNumber' => 'required|string',
            'transaction_id' => 'required|string',
            'customerName' => 'required|string',
            'reportImage' => 'required|image|mimes:jpeg,png,jpg|max:1024',
            'reportText' => 'required|string',
        ]);

        $gambar = $request->file('reportImage');
        $gambar-> storeAs('public/reports', $gambar->hashName());


        Report::create([
            'reportNumber' => $request->reportNumber,
            'transaction_id' => $request->transaction_id,
            'customerName' => $request->customerName,
            'reportImage' => $gambar->hashName(),
            'reportText' => $request->reportText,
        ]);

        return view('laundry')->with('success', 'Report berhasil terkirim');
    }

    public function show(string $id)
    {
        $report = Report::findOrFail($id);

        return view('report.show', compact('report'));
    }

    public function destroy(string $id)
    {
        $report = Report::findOrFail($id);
        $report->delete();
        return redirect()->route('daftarReport')->with('success', 'Report deleted successfully');
    }
}