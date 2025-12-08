<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trabalho;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $totalPendentes = Trabalho::where('is_done', false)->count();
        $totalConcluidos = Trabalho::where('is_done', true)->count();
        
        $totalAtrasados = Trabalho::where('is_done', false)
            ->whereDate('due_date', '<', now())
            ->count();

        $altas = Trabalho::where('is_done', false)->where('priority', 'alta')->count();
        $medias = Trabalho::where('is_done', false)->where('priority', 'media')->count();
        $baixas = Trabalho::where('is_done', false)->where('priority', 'baixa')->count();

        $recentes = Trabalho::with('category')
            ->where('is_done', false)
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        return view('dashboard', compact(
            'totalPendentes', 
            'totalConcluidos', 
            'totalAtrasados', 
            'altas', 
            'medias', 
            'baixas',
            'recentes'
        ));
    }
}