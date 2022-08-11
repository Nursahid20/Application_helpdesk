<?php

namespace App\Http\Controllers;

use App\Models\Tiket;
use App\Models\User;
use App\Models\AsetHardware;
use App\Models\AsetSoftware;
use App\Models\EvaluasiTiket;
use App\Models\Karyawan;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function dashboardAdmin()
    {
        $january_finish = Tiket::where('kode_tiket', '!=', '-')->whereMonth('created_at', 1)->whereYear('created_at', date("Y"))->where('status_id', 3)->get();
        $february_finish = Tiket::where('kode_tiket', '!=', '-')->whereMonth('created_at', 2)->whereYear('created_at', date("Y"))->where('status_id', 3)->get();
        $march_finish = Tiket::where('kode_tiket', '!=', '-')->whereMonth('created_at', 3)->whereYear('created_at', date("Y"))->where('status_id', 3)->get();
        $april_finish = Tiket::where('kode_tiket', '!=', '-')->whereMonth('created_at', 4)->whereYear('created_at', date("Y"))->where('status_id', 3)->get();
        $may_finish = Tiket::where('kode_tiket', '!=', '-')->whereMonth('created_at', 5)->whereYear('created_at', date("Y"))->where('status_id', 3)->get();
        $june_finish = Tiket::where('kode_tiket', '!=', '-')->whereMonth('created_at', 6)->whereYear('created_at', date("Y"))->where('status_id', 3)->get();
        $july_finish = Tiket::where('kode_tiket', '!=', '-')->whereMonth('created_at', 7)->whereYear('created_at', date("Y"))->where('status_id', 3)->get();
        $agust_finish = Tiket::where('kode_tiket', '!=', '-')->whereMonth('created_at', 8)->whereYear('created_at', date("Y"))->where('status_id', 3)->get();
        $september_finish = Tiket::where('kode_tiket', '!=', '-')->whereMonth('created_at', 9)->whereYear('created_at', date("Y"))->where('status_id', 3)->get();
        $october_finish = Tiket::where('kode_tiket', '!=', '-')->whereMonth('created_at', 10)->whereYear('created_at', date("Y"))->where('status_id', 3)->get();
        $november_finish = Tiket::where('kode_tiket', '!=', '-')->whereMonth('created_at', 11)->whereYear('created_at', date("Y"))->where('status_id', 3)->get();
        $december_finish = Tiket::where('kode_tiket', '!=', '-')->whereMonth('created_at', 12)->whereYear('created_at', date("Y"))->where('status_id', 3)->get();
        //denied
        $january_denied = Tiket::where('kode_tiket', '!=', '-')->whereMonth('created_at', 1)->whereYear('created_at', date("Y"))->where('status_id', 4)->get();
        $february_denied = Tiket::where('kode_tiket', '!=', '-')->whereMonth('created_at', 2)->whereYear('created_at', date("Y"))->where('status_id', 4)->get();
        $march_denied = Tiket::where('kode_tiket', '!=', '-')->whereMonth('created_at', 3)->whereYear('created_at', date("Y"))->where('status_id', 4)->get();
        $april_denied = Tiket::where('kode_tiket', '!=', '-')->whereMonth('created_at', 4)->whereYear('created_at', date("Y"))->where('status_id', 4)->get();
        $may_denied = Tiket::where('kode_tiket', '!=', '-')->whereMonth('created_at', 5)->whereYear('created_at', date("Y"))->where('status_id', 4)->get();
        $june_denied = Tiket::where('kode_tiket', '!=', '-')->whereMonth('created_at', 6)->whereYear('created_at', date("Y"))->where('status_id', 4)->get();
        $july_denied = Tiket::where('kode_tiket', '!=', '-')->whereMonth('created_at', 7)->whereYear('created_at', date("Y"))->where('status_id', 4)->get();
        $agust_denied = Tiket::where('kode_tiket', '!=', '-')->whereMonth('created_at', 8)->whereYear('created_at', date("Y"))->where('status_id', 4)->get();
        $september_denied = Tiket::where('kode_tiket', '!=', '-')->whereMonth('created_at', 9)->whereYear('created_at', date("Y"))->where('status_id', 4)->get();
        $october_denied = Tiket::where('kode_tiket', '!=', '-')->whereMonth('created_at', 10)->whereYear('created_at', date("Y"))->where('status_id', 4)->get();
        $november_denied = Tiket::where('kode_tiket', '!=', '-')->whereMonth('created_at', 11)->whereYear('created_at', date("Y"))->where('status_id', 4)->get();
        $december_denied = Tiket::where('kode_tiket', '!=', '-')->whereMonth('created_at', 12)->whereYear('created_at', date("Y"))->where('status_id', 4)->get();
        //wait admin
        $january_wait_admin = Tiket::where('kode_tiket', '!=', '-')->whereMonth('created_at', 1)->whereYear('created_at', date("Y"))->where('status_id', 5)->get();
        $february_wait_admin = Tiket::where('kode_tiket', '!=', '-')->whereMonth('created_at', 2)->whereYear('created_at', date("Y"))->where('status_id', 5)->get();
        $march_wait_admin = Tiket::where('kode_tiket', '!=', '-')->whereMonth('created_at', 3)->whereYear('created_at', date("Y"))->where('status_id', 5)->get();
        $april_wait_admin = Tiket::where('kode_tiket', '!=', '-')->whereMonth('created_at', 4)->whereYear('created_at', date("Y"))->where('status_id', 5)->get();
        $may_wait_admin = Tiket::where('kode_tiket', '!=', '-')->whereMonth('created_at', 5)->whereYear('created_at', date("Y"))->where('status_id', 5)->get();
        $june_wait_admin = Tiket::where('kode_tiket', '!=', '-')->whereMonth('created_at', 6)->whereYear('created_at', date("Y"))->where('status_id', 5)->get();
        $july_wait_admin = Tiket::where('kode_tiket', '!=', '-')->whereMonth('created_at', 7)->whereYear('created_at', date("Y"))->where('status_id', 5)->get();
        $agust_wait_admin = Tiket::where('kode_tiket', '!=', '-')->whereMonth('created_at', 8)->whereYear('created_at', date("Y"))->where('status_id', 5)->get();
        $september_wait_admin = Tiket::where('kode_tiket', '!=', '-')->whereMonth('created_at', 9)->whereYear('created_at', date("Y"))->where('status_id', 5)->get();
        $october_wait_admin = Tiket::where('kode_tiket', '!=', '-')->whereMonth('created_at', 10)->whereYear('created_at', date("Y"))->where('status_id', 5)->get();
        $november_wait_admin = Tiket::where('kode_tiket', '!=', '-')->whereMonth('created_at', 11)->whereYear('created_at', date("Y"))->where('status_id', 5)->get();
        $december_wait_admin = Tiket::where('kode_tiket', '!=', '-')->whereMonth('created_at', 12)->whereYear('created_at', date("Y"))->where('status_id', 5)->get();

        $january_wait_it = Tiket::where('kode_tiket', '!=', '-')->whereMonth('created_at', 1)->whereYear('created_at', date("Y"))->where('status_id', 6)->get();
        $february_wait_it = Tiket::where('kode_tiket', '!=', '-')->whereMonth('created_at', 2)->whereYear('created_at', date("Y"))->where('status_id', 6)->get();
        $march_wait_it = Tiket::where('kode_tiket', '!=', '-')->whereMonth('created_at', 3)->whereYear('created_at', date("Y"))->where('status_id', 6)->get();
        $april_wait_it = Tiket::where('kode_tiket', '!=', '-')->whereMonth('created_at', 4)->whereYear('created_at', date("Y"))->where('status_id', 6)->get();
        $may_wait_it = Tiket::where('kode_tiket', '!=', '-')->whereMonth('created_at', 6)->whereYear('created_at', date("Y"))->where('status_id', 6)->get();
        $june_wait_it = Tiket::where('kode_tiket', '!=', '-')->whereMonth('created_at', 6)->whereYear('created_at', date("Y"))->where('status_id', 6)->get();
        $july_wait_it = Tiket::where('kode_tiket', '!=', '-')->whereMonth('created_at', 7)->whereYear('created_at', date("Y"))->where('status_id', 6)->get();
        $agust_wait_it = Tiket::where('kode_tiket', '!=', '-')->whereMonth('created_at', 8)->whereYear('created_at', date("Y"))->where('status_id', 6)->get();
        $september_wait_it = Tiket::where('kode_tiket', '!=', '-')->whereMonth('created_at', 9)->whereYear('created_at', date("Y"))->where('status_id', 6)->get();
        $october_wait_it = Tiket::where('kode_tiket', '!=', '-')->whereMonth('created_at', 10)->whereYear('created_at', date("Y"))->where('status_id', 6)->get();
        $november_wait_it = Tiket::where('kode_tiket', '!=', '-')->whereMonth('created_at', 11)->whereYear('created_at', date("Y"))->where('status_id', 6)->get();
        $december_wait_it = Tiket::where('kode_tiket', '!=', '-')->whereMonth('created_at', 12)->whereYear('created_at', date("Y"))->where('status_id', 6)->get();


        return view('admin.home.home', [
            'karyawan' => count(Karyawan::where('nama', '!=', '-')->get()),
            'it_support' => count(User::where('level_user', 'IT Support')->get()),
            'tiket_selesai' => count(Tiket::where('status_id', 3)->get()),
            'tiket_proses' => count(Tiket::where('status_id', 2)->get()),
            'menunggu_1' => count(Tiket::where('status_id', 5)->get()),
            'menunggu_2' => count(Tiket::where('status_id', 6)->get()),
            'tiket_ditolak' => count(Tiket::where('status_id', 4)->get()),
            'hardware' => count(AsetHardware::where('kode_hardware', '!=', '-')->get()),
            'software' => count(AsetSoftware::all()),

            'january_finish' => count($january_finish),
            'february_finish' => count($february_finish),
            'march_finish' => count($march_finish),
            'april_finish' => count($april_finish),
            'may_finish' => count($may_finish),
            'june_finish' => count($june_finish),
            'july_finish' => count($july_finish),
            'agust_finish' => count($agust_finish),
            'september_finish' => count($september_finish),
            'october_finish' => count($october_finish),
            'november_finish' => count($november_finish),
            'december_finish' => count($december_finish),

            'january_denied' => count($january_denied),
            'february_denied' => count($february_denied),
            'march_denied' => count($march_denied),
            'april_denied' => count($april_denied),
            'may_denied' => count($may_denied),
            'june_denied' => count($june_denied),
            'july_denied' => count($july_denied),
            'agust_denied' => count($agust_denied),
            'september_denied' => count($september_denied),
            'october_denied' => count($october_denied),
            'november_denied' => count($november_denied),
            'december_denied' => count($december_denied),

            'january_wait' => count($january_wait_admin) + count($january_wait_it),
            'february_wait' => count($february_wait_admin) + count($february_wait_it),
            'march_wait' => count($march_wait_admin) + count($march_wait_it),
            'april_wait' => count($april_wait_admin) + count($april_wait_it),
            'may_wait' => count($may_wait_admin) + count($may_wait_it),
            'june_wait' => count($june_wait_admin) + count($june_wait_it),
            'july_wait' => count($july_wait_admin) + count($july_wait_it),
            'agust_wait' => count($agust_wait_admin) + count($agust_wait_it),
            'september_wait' => count($september_wait_admin) + count($september_wait_it),
            'october_wait' => count($october_wait_admin) + count($october_wait_it),
            'november_wait' => count($november_wait_admin) + count($november_wait_it),
            'december_wait' => count($december_wait_admin) + count($december_wait_it),
        ]);
    }

    public function dashboardUser()
    {
        $january_finish = Tiket::where('kode_tiket', '!=', '-')->where('karyawan_id', auth()->user()->karyawan_id)->whereMonth('created_at', 1)->whereYear('created_at', date("Y"))->where('status_id', 3)->get();
        $february_finish = Tiket::where('kode_tiket', '!=', '-')->where('karyawan_id', auth()->user()->karyawan_id)->whereMonth('created_at', 2)->whereYear('created_at', date("Y"))->where('status_id', 3)->get();
        $march_finish = Tiket::where('kode_tiket', '!=', '-')->where('karyawan_id', auth()->user()->karyawan_id)->whereMonth('created_at', 3)->whereYear('created_at', date("Y"))->where('status_id', 3)->get();
        $april_finish = Tiket::where('kode_tiket', '!=', '-')->where('karyawan_id', auth()->user()->karyawan_id)->whereMonth('created_at', 4)->whereYear('created_at', date("Y"))->where('status_id', 3)->get();
        $may_finish = Tiket::where('kode_tiket', '!=', '-')->where('karyawan_id', auth()->user()->karyawan_id)->whereMonth('created_at', 5)->whereYear('created_at', date("Y"))->where('status_id', 3)->get();
        $june_finish = Tiket::where('kode_tiket', '!=', '-')->where('karyawan_id', auth()->user()->karyawan_id)->whereMonth('created_at', 6)->whereYear('created_at', date("Y"))->where('status_id', 3)->get();
        $july_finish = Tiket::where('kode_tiket', '!=', '-')->where('karyawan_id', auth()->user()->karyawan_id)->whereMonth('created_at', 7)->whereYear('created_at', date("Y"))->where('status_id', 3)->get();
        $agust_finish = Tiket::where('kode_tiket', '!=', '-')->where('karyawan_id', auth()->user()->karyawan_id)->whereMonth('created_at', 8)->whereYear('created_at', date("Y"))->where('status_id', 3)->get();
        $september_finish = Tiket::where('kode_tiket', '!=', '-')->where('karyawan_id', auth()->user()->karyawan_id)->whereMonth('created_at', 9)->whereYear('created_at', date("Y"))->where('status_id', 3)->get();
        $october_finish = Tiket::where('kode_tiket', '!=', '-')->where('karyawan_id', auth()->user()->karyawan_id)->whereMonth('created_at', 10)->whereYear('created_at', date("Y"))->where('status_id', 3)->get();
        $november_finish = Tiket::where('kode_tiket', '!=', '-')->where('karyawan_id', auth()->user()->karyawan_id)->whereMonth('created_at', 11)->whereYear('created_at', date("Y"))->where('status_id', 3)->get();
        $december_finish = Tiket::where('kode_tiket', '!=', '-')->where('karyawan_id', auth()->user()->karyawan_id)->whereMonth('created_at', 12)->whereYear('created_at', date("Y"))->where('status_id', 3)->get();
        //denied
        $january_denied = Tiket::where('kode_tiket', '!=', '-')->where('karyawan_id', auth()->user()->karyawan_id)->whereMonth('created_at', 1)->whereYear('created_at', date("Y"))->where('status_id', 4)->get();
        $february_denied = Tiket::where('kode_tiket', '!=', '-')->where('karyawan_id', auth()->user()->karyawan_id)->whereMonth('created_at', 2)->whereYear('created_at', date("Y"))->where('status_id', 4)->get();
        $march_denied = Tiket::where('kode_tiket', '!=', '-')->where('karyawan_id', auth()->user()->karyawan_id)->whereMonth('created_at', 3)->whereYear('created_at', date("Y"))->where('status_id', 4)->get();
        $april_denied = Tiket::where('kode_tiket', '!=', '-')->where('karyawan_id', auth()->user()->karyawan_id)->whereMonth('created_at', 4)->whereYear('created_at', date("Y"))->where('status_id', 4)->get();
        $may_denied = Tiket::where('kode_tiket', '!=', '-')->where('karyawan_id', auth()->user()->karyawan_id)->whereMonth('created_at', 5)->whereYear('created_at', date("Y"))->where('status_id', 4)->get();
        $june_denied = Tiket::where('kode_tiket', '!=', '-')->where('karyawan_id', auth()->user()->karyawan_id)->whereMonth('created_at', 6)->whereYear('created_at', date("Y"))->where('status_id', 4)->get();
        $july_denied = Tiket::where('kode_tiket', '!=', '-')->where('karyawan_id', auth()->user()->karyawan_id)->whereMonth('created_at', 7)->whereYear('created_at', date("Y"))->where('status_id', 4)->get();
        $agust_denied = Tiket::where('kode_tiket', '!=', '-')->where('karyawan_id', auth()->user()->karyawan_id)->whereMonth('created_at', 8)->whereYear('created_at', date("Y"))->where('status_id', 4)->get();
        $september_denied = Tiket::where('kode_tiket', '!=', '-')->where('karyawan_id', auth()->user()->karyawan_id)->whereMonth('created_at', 9)->whereYear('created_at', date("Y"))->where('status_id', 4)->get();
        $october_denied = Tiket::where('kode_tiket', '!=', '-')->where('karyawan_id', auth()->user()->karyawan_id)->whereMonth('created_at', 10)->whereYear('created_at', date("Y"))->where('status_id', 4)->get();
        $november_denied = Tiket::where('kode_tiket', '!=', '-')->where('karyawan_id', auth()->user()->karyawan_id)->whereMonth('created_at', 11)->whereYear('created_at', date("Y"))->where('status_id', 4)->get();
        $december_denied = Tiket::where('kode_tiket', '!=', '-')->where('karyawan_id', auth()->user()->karyawan_id)->whereMonth('created_at', 12)->whereYear('created_at', date("Y"))->where('status_id', 4)->get();
        //wait admin
        $january_wait_admin = Tiket::where('kode_tiket', '!=', '-')->where('karyawan_id', auth()->user()->karyawan_id)->whereMonth('created_at', 1)->whereYear('created_at', date("Y"))->where('status_id', 5)->get();
        $february_wait_admin = Tiket::where('kode_tiket', '!=', '-')->where('karyawan_id', auth()->user()->karyawan_id)->whereMonth('created_at', 2)->whereYear('created_at', date("Y"))->where('status_id', 5)->get();
        $march_wait_admin = Tiket::where('kode_tiket', '!=', '-')->where('karyawan_id', auth()->user()->karyawan_id)->whereMonth('created_at', 3)->whereYear('created_at', date("Y"))->where('status_id', 5)->get();
        $april_wait_admin = Tiket::where('kode_tiket', '!=', '-')->where('karyawan_id', auth()->user()->karyawan_id)->whereMonth('created_at', 4)->whereYear('created_at', date("Y"))->where('status_id', 5)->get();
        $may_wait_admin = Tiket::where('kode_tiket', '!=', '-')->where('karyawan_id', auth()->user()->karyawan_id)->whereMonth('created_at', 5)->whereYear('created_at', date("Y"))->where('status_id', 5)->get();
        $june_wait_admin = Tiket::where('kode_tiket', '!=', '-')->where('karyawan_id', auth()->user()->karyawan_id)->whereMonth('created_at', 6)->whereYear('created_at', date("Y"))->where('status_id', 5)->get();
        $july_wait_admin = Tiket::where('kode_tiket', '!=', '-')->where('karyawan_id', auth()->user()->karyawan_id)->whereMonth('created_at', 7)->whereYear('created_at', date("Y"))->where('status_id', 5)->get();
        $agust_wait_admin = Tiket::where('kode_tiket', '!=', '-')->where('karyawan_id', auth()->user()->karyawan_id)->whereMonth('created_at', 8)->whereYear('created_at', date("Y"))->where('status_id', 5)->get();
        $september_wait_admin = Tiket::where('kode_tiket', '!=', '-')->where('karyawan_id', auth()->user()->karyawan_id)->whereMonth('created_at', 9)->whereYear('created_at', date("Y"))->where('status_id', 5)->get();
        $october_wait_admin = Tiket::where('kode_tiket', '!=', '-')->where('karyawan_id', auth()->user()->karyawan_id)->whereMonth('created_at', 10)->whereYear('created_at', date("Y"))->where('status_id', 5)->get();
        $november_wait_admin = Tiket::where('kode_tiket', '!=', '-')->where('karyawan_id', auth()->user()->karyawan_id)->whereMonth('created_at', 11)->whereYear('created_at', date("Y"))->where('status_id', 5)->get();
        $december_wait_admin = Tiket::where('kode_tiket', '!=', '-')->where('karyawan_id', auth()->user()->karyawan_id)->whereMonth('created_at', 12)->whereYear('created_at', date("Y"))->where('status_id', 5)->get();

        $january_wait_it = Tiket::where('kode_tiket', '!=', '-')->where('karyawan_id', auth()->user()->karyawan_id)->whereMonth('created_at', 1)->whereYear('created_at', date("Y"))->where('status_id', 6)->get();
        $february_wait_it = Tiket::where('kode_tiket', '!=', '-')->where('karyawan_id', auth()->user()->karyawan_id)->whereMonth('created_at', 2)->whereYear('created_at', date("Y"))->where('status_id', 6)->get();
        $march_wait_it = Tiket::where('kode_tiket', '!=', '-')->where('karyawan_id', auth()->user()->karyawan_id)->whereMonth('created_at', 3)->whereYear('created_at', date("Y"))->where('status_id', 6)->get();
        $april_wait_it = Tiket::where('kode_tiket', '!=', '-')->where('karyawan_id', auth()->user()->karyawan_id)->whereMonth('created_at', 4)->whereYear('created_at', date("Y"))->where('status_id', 6)->get();
        $may_wait_it = Tiket::where('kode_tiket', '!=', '-')->where('karyawan_id', auth()->user()->karyawan_id)->whereMonth('created_at', 6)->whereYear('created_at', date("Y"))->where('status_id', 6)->get();
        $june_wait_it = Tiket::where('kode_tiket', '!=', '-')->where('karyawan_id', auth()->user()->karyawan_id)->whereMonth('created_at', 6)->whereYear('created_at', date("Y"))->where('status_id', 6)->get();
        $july_wait_it = Tiket::where('kode_tiket', '!=', '-')->where('karyawan_id', auth()->user()->karyawan_id)->whereMonth('created_at', 7)->whereYear('created_at', date("Y"))->where('status_id', 6)->get();
        $agust_wait_it = Tiket::where('kode_tiket', '!=', '-')->where('karyawan_id', auth()->user()->karyawan_id)->whereMonth('created_at', 8)->whereYear('created_at', date("Y"))->where('status_id', 6)->get();
        $september_wait_it = Tiket::where('kode_tiket', '!=', '-')->where('karyawan_id', auth()->user()->karyawan_id)->whereMonth('created_at', 9)->whereYear('created_at', date("Y"))->where('status_id', 6)->get();
        $october_wait_it = Tiket::where('kode_tiket', '!=', '-')->where('karyawan_id', auth()->user()->karyawan_id)->whereMonth('created_at', 10)->whereYear('created_at', date("Y"))->where('status_id', 6)->get();
        $november_wait_it = Tiket::where('kode_tiket', '!=', '-')->where('karyawan_id', auth()->user()->karyawan_id)->whereMonth('created_at', 11)->whereYear('created_at', date("Y"))->where('status_id', 6)->get();
        $december_wait_it = Tiket::where('kode_tiket', '!=', '-')->where('karyawan_id', auth()->user()->karyawan_id)->whereMonth('created_at', 12)->whereYear('created_at', date("Y"))->where('status_id', 6)->get();


        return view('user.home.index', [
            'tiket_ditolak' => count(Tiket::where('karyawan_id', auth()->user()->karyawan->id)->where('status_id', 3)->get()),
            'tiket_selesai' => count(Tiket::where('karyawan_id', auth()->user()->karyawan->id)->where('status_id', 3)->get()),
            'tiket_proses' => count(Tiket::where('karyawan_id', auth()->user()->karyawan->id)->where('status_id', 2)->get()),
            'menunggu_1' => count(Tiket::where('karyawan_id', auth()->user()->karyawan->id)->where('status_id', 6)->get()),
            'menunggu_2' => count(Tiket::where('karyawan_id', auth()->user()->karyawan->id)->where('status_id', 5)->get()),

            'january_finish' => count($january_finish),
            'february_finish' => count($february_finish),
            'march_finish' => count($march_finish),
            'april_finish' => count($april_finish),
            'may_finish' => count($may_finish),
            'june_finish' => count($june_finish),
            'july_finish' => count($july_finish),
            'agust_finish' => count($agust_finish),
            'september_finish' => count($september_finish),
            'october_finish' => count($october_finish),
            'november_finish' => count($november_finish),
            'december_finish' => count($december_finish),

            'january_denied' => count($january_denied),
            'february_denied' => count($february_denied),
            'march_denied' => count($march_denied),
            'april_denied' => count($april_denied),
            'may_denied' => count($may_denied),
            'june_denied' => count($june_denied),
            'july_denied' => count($july_denied),
            'agust_denied' => count($agust_denied),
            'september_denied' => count($september_denied),
            'october_denied' => count($october_denied),
            'november_denied' => count($november_denied),
            'december_denied' => count($december_denied),

            'january_wait' => count($january_wait_admin) + count($january_wait_it),
            'february_wait' => count($february_wait_admin) + count($february_wait_it),
            'march_wait' => count($march_wait_admin) + count($march_wait_it),
            'april_wait' => count($april_wait_admin) + count($april_wait_it),
            'may_wait' => count($may_wait_admin) + count($may_wait_it),
            'june_wait' => count($june_wait_admin) + count($june_wait_it),
            'july_wait' => count($july_wait_admin) + count($july_wait_it),
            'agust_wait' => count($agust_wait_admin) + count($agust_wait_it),
            'september_wait' => count($september_wait_admin) + count($september_wait_it),
            'october_wait' => count($october_wait_admin) + count($october_wait_it),
            'november_wait' => count($november_wait_admin) + count($november_wait_it),
            'december_wait' => count($december_wait_admin) + count($december_wait_it),
        ]);
    }

    public function dashboardItSupport()
    {

        $january_finish = Tiket::where('kode_tiket', '!=', '-')->where('it_support_id', auth()->user()->karyawan_id)->whereMonth('created_at', 1)->whereYear('created_at', date("Y"))->where('status_id', 3)->get();
        $february_finish = Tiket::where('kode_tiket', '!=', '-')->where('it_support_id', auth()->user()->karyawan_id)->whereMonth('created_at', 2)->whereYear('created_at', date("Y"))->where('status_id', 3)->get();
        $march_finish = Tiket::where('kode_tiket', '!=', '-')->where('it_support_id', auth()->user()->karyawan_id)->whereMonth('created_at', 3)->whereYear('created_at', date("Y"))->where('status_id', 3)->get();
        $april_finish = Tiket::where('kode_tiket', '!=', '-')->where('it_support_id', auth()->user()->karyawan_id)->whereMonth('created_at', 4)->whereYear('created_at', date("Y"))->where('status_id', 3)->get();
        $may_finish = Tiket::where('kode_tiket', '!=', '-')->where('it_support_id', auth()->user()->karyawan_id)->whereMonth('created_at', 5)->whereYear('created_at', date("Y"))->where('status_id', 3)->get();
        $june_finish = Tiket::where('kode_tiket', '!=', '-')->where('it_support_id', auth()->user()->karyawan_id)->whereMonth('created_at', 6)->whereYear('created_at', date("Y"))->where('status_id', 3)->get();
        $july_finish = Tiket::where('kode_tiket', '!=', '-')->where('it_support_id', auth()->user()->karyawan_id)->whereMonth('created_at', 7)->whereYear('created_at', date("Y"))->where('status_id', 3)->get();
        $agust_finish = Tiket::where('kode_tiket', '!=', '-')->where('it_support_id', auth()->user()->karyawan_id)->whereMonth('created_at', 8)->whereYear('created_at', date("Y"))->where('status_id', 3)->get();
        $september_finish = Tiket::where('kode_tiket', '!=', '-')->where('it_support_id', auth()->user()->karyawan_id)->whereMonth('created_at', 9)->whereYear('created_at', date("Y"))->where('status_id', 3)->get();
        $october_finish = Tiket::where('kode_tiket', '!=', '-')->where('it_support_id', auth()->user()->karyawan_id)->whereMonth('created_at', 10)->whereYear('created_at', date("Y"))->where('status_id', 3)->get();
        $november_finish = Tiket::where('kode_tiket', '!=', '-')->where('it_support_id', auth()->user()->karyawan_id)->whereMonth('created_at', 11)->whereYear('created_at', date("Y"))->where('status_id', 3)->get();
        $december_finish = Tiket::where('kode_tiket', '!=', '-')->where('it_support_id', auth()->user()->karyawan_id)->whereMonth('created_at', 12)->whereYear('created_at', date("Y"))->where('status_id', 3)->get();
        //denied
        $january_denied = Tiket::where('kode_tiket', '!=', '-')->where('it_support_id', auth()->user()->karyawan_id)->whereMonth('created_at', 1)->whereYear('created_at', date("Y"))->where('status_id', 4)->get();
        $february_denied = Tiket::where('kode_tiket', '!=', '-')->where('it_support_id', auth()->user()->karyawan_id)->whereMonth('created_at', 2)->whereYear('created_at', date("Y"))->where('status_id', 4)->get();
        $march_denied = Tiket::where('kode_tiket', '!=', '-')->where('it_support_id', auth()->user()->karyawan_id)->whereMonth('created_at', 3)->whereYear('created_at', date("Y"))->where('status_id', 4)->get();
        $april_denied = Tiket::where('kode_tiket', '!=', '-')->where('it_support_id', auth()->user()->karyawan_id)->whereMonth('created_at', 4)->whereYear('created_at', date("Y"))->where('status_id', 4)->get();
        $may_denied = Tiket::where('kode_tiket', '!=', '-')->where('it_support_id', auth()->user()->karyawan_id)->whereMonth('created_at', 5)->whereYear('created_at', date("Y"))->where('status_id', 4)->get();
        $june_denied = Tiket::where('kode_tiket', '!=', '-')->where('it_support_id', auth()->user()->karyawan_id)->whereMonth('created_at', 6)->whereYear('created_at', date("Y"))->where('status_id', 4)->get();
        $july_denied = Tiket::where('kode_tiket', '!=', '-')->where('it_support_id', auth()->user()->karyawan_id)->whereMonth('created_at', 7)->whereYear('created_at', date("Y"))->where('status_id', 4)->get();
        $agust_denied = Tiket::where('kode_tiket', '!=', '-')->where('it_support_id', auth()->user()->karyawan_id)->whereMonth('created_at', 8)->whereYear('created_at', date("Y"))->where('status_id', 4)->get();
        $september_denied = Tiket::where('kode_tiket', '!=', '-')->where('it_support_id', auth()->user()->karyawan_id)->whereMonth('created_at', 9)->whereYear('created_at', date("Y"))->where('status_id', 4)->get();
        $october_denied = Tiket::where('kode_tiket', '!=', '-')->where('it_support_id', auth()->user()->karyawan_id)->whereMonth('created_at', 10)->whereYear('created_at', date("Y"))->where('status_id', 4)->get();
        $november_denied = Tiket::where('kode_tiket', '!=', '-')->where('it_support_id', auth()->user()->karyawan_id)->whereMonth('created_at', 11)->whereYear('created_at', date("Y"))->where('status_id', 4)->get();
        $december_denied = Tiket::where('kode_tiket', '!=', '-')->where('it_support_id', auth()->user()->karyawan_id)->whereMonth('created_at', 12)->whereYear('created_at', date("Y"))->where('status_id', 4)->get();
        //wait admin
        $january_wait_admin = Tiket::where('kode_tiket', '!=', '-')->where('it_support_id', auth()->user()->karyawan_id)->whereMonth('created_at', 1)->whereYear('created_at', date("Y"))->where('status_id', 5)->get();
        $february_wait_admin = Tiket::where('kode_tiket', '!=', '-')->where('it_support_id', auth()->user()->karyawan_id)->whereMonth('created_at', 2)->whereYear('created_at', date("Y"))->where('status_id', 5)->get();
        $march_wait_admin = Tiket::where('kode_tiket', '!=', '-')->where('it_support_id', auth()->user()->karyawan_id)->whereMonth('created_at', 3)->whereYear('created_at', date("Y"))->where('status_id', 5)->get();
        $april_wait_admin = Tiket::where('kode_tiket', '!=', '-')->where('it_support_id', auth()->user()->karyawan_id)->whereMonth('created_at', 4)->whereYear('created_at', date("Y"))->where('status_id', 5)->get();
        $may_wait_admin = Tiket::where('kode_tiket', '!=', '-')->where('it_support_id', auth()->user()->karyawan_id)->whereMonth('created_at', 5)->whereYear('created_at', date("Y"))->where('status_id', 5)->get();
        $june_wait_admin = Tiket::where('kode_tiket', '!=', '-')->where('it_support_id', auth()->user()->karyawan_id)->whereMonth('created_at', 6)->whereYear('created_at', date("Y"))->where('status_id', 5)->get();
        $july_wait_admin = Tiket::where('kode_tiket', '!=', '-')->where('it_support_id', auth()->user()->karyawan_id)->whereMonth('created_at', 7)->whereYear('created_at', date("Y"))->where('status_id', 5)->get();
        $agust_wait_admin = Tiket::where('kode_tiket', '!=', '-')->where('it_support_id', auth()->user()->karyawan_id)->whereMonth('created_at', 8)->whereYear('created_at', date("Y"))->where('status_id', 5)->get();
        $september_wait_admin = Tiket::where('kode_tiket', '!=', '-')->where('it_support_id', auth()->user()->karyawan_id)->whereMonth('created_at', 9)->whereYear('created_at', date("Y"))->where('status_id', 5)->get();
        $october_wait_admin = Tiket::where('kode_tiket', '!=', '-')->where('it_support_id', auth()->user()->karyawan_id)->whereMonth('created_at', 10)->whereYear('created_at', date("Y"))->where('status_id', 5)->get();
        $november_wait_admin = Tiket::where('kode_tiket', '!=', '-')->where('it_support_id', auth()->user()->karyawan_id)->whereMonth('created_at', 11)->whereYear('created_at', date("Y"))->where('status_id', 5)->get();
        $december_wait_admin = Tiket::where('kode_tiket', '!=', '-')->where('it_support_id', auth()->user()->karyawan_id)->whereMonth('created_at', 12)->whereYear('created_at', date("Y"))->where('status_id', 5)->get();

        $january_wait_it = Tiket::where('kode_tiket', '!=', '-')->where('it_support_id', auth()->user()->karyawan_id)->whereMonth('created_at', 1)->whereYear('created_at', date("Y"))->where('status_id', 6)->get();
        $february_wait_it = Tiket::where('kode_tiket', '!=', '-')->where('it_support_id', auth()->user()->karyawan_id)->whereMonth('created_at', 2)->whereYear('created_at', date("Y"))->where('status_id', 6)->get();
        $march_wait_it = Tiket::where('kode_tiket', '!=', '-')->where('it_support_id', auth()->user()->karyawan_id)->whereMonth('created_at', 3)->whereYear('created_at', date("Y"))->where('status_id', 6)->get();
        $april_wait_it = Tiket::where('kode_tiket', '!=', '-')->where('it_support_id', auth()->user()->karyawan_id)->whereMonth('created_at', 4)->whereYear('created_at', date("Y"))->where('status_id', 6)->get();
        $may_wait_it = Tiket::where('kode_tiket', '!=', '-')->where('it_support_id', auth()->user()->karyawan_id)->whereMonth('created_at', 6)->whereYear('created_at', date("Y"))->where('status_id', 6)->get();
        $june_wait_it = Tiket::where('kode_tiket', '!=', '-')->where('it_support_id', auth()->user()->karyawan_id)->whereMonth('created_at', 6)->whereYear('created_at', date("Y"))->where('status_id', 6)->get();
        $july_wait_it = Tiket::where('kode_tiket', '!=', '-')->where('it_support_id', auth()->user()->karyawan_id)->whereMonth('created_at', 7)->whereYear('created_at', date("Y"))->where('status_id', 6)->get();
        $agust_wait_it = Tiket::where('kode_tiket', '!=', '-')->where('it_support_id', auth()->user()->karyawan_id)->whereMonth('created_at', 8)->whereYear('created_at', date("Y"))->where('status_id', 6)->get();
        $september_wait_it = Tiket::where('kode_tiket', '!=', '-')->where('it_support_id', auth()->user()->karyawan_id)->whereMonth('created_at', 9)->whereYear('created_at', date("Y"))->where('status_id', 6)->get();
        $october_wait_it = Tiket::where('kode_tiket', '!=', '-')->where('it_support_id', auth()->user()->karyawan_id)->whereMonth('created_at', 10)->whereYear('created_at', date("Y"))->where('status_id', 6)->get();
        $november_wait_it = Tiket::where('kode_tiket', '!=', '-')->where('it_support_id', auth()->user()->karyawan_id)->whereMonth('created_at', 11)->whereYear('created_at', date("Y"))->where('status_id', 6)->get();
        $december_wait_it = Tiket::where('kode_tiket', '!=', '-')->where('it_support_id', auth()->user()->karyawan_id)->whereMonth('created_at', 12)->whereYear('created_at', date("Y"))->where('status_id', 6)->get();
        return view('it-support.home.index', [
            'karyawan' => count(Karyawan::where('nama', '!=', '-')->get()),
            'it_support' => count(User::where('level_user', 'IT Support')->get()),
            'hardware' => count(AsetHardware::where('kode_hardware', '!=', '-')->get()),
            'software' => count(AsetSoftware::all()),
            'tiket_ditolak' => count(Tiket::where('it_support_id', auth()->user()->karyawan->id)->where('status_id', 3)->get()),
            'tiket_selesai' => count(Tiket::where('it_support_id', auth()->user()->karyawan->id)->where('status_id', 3)->get()),
            'tiket_proses' => count(Tiket::where('it_support_id', auth()->user()->karyawan->id)->where('status_id', 2)->get()),
            'tiket_menunggu' => count(Tiket::where('it_support_id', auth()->user()->karyawan->id)->where('status_id', 6)->get()),

            'january_finish' => count($january_finish),
            'february_finish' => count($february_finish),
            'march_finish' => count($march_finish),
            'april_finish' => count($april_finish),
            'may_finish' => count($may_finish),
            'june_finish' => count($june_finish),
            'july_finish' => count($july_finish),
            'agust_finish' => count($agust_finish),
            'september_finish' => count($september_finish),
            'october_finish' => count($october_finish),
            'november_finish' => count($november_finish),
            'december_finish' => count($december_finish),

            'january_denied' => count($january_denied),
            'february_denied' => count($february_denied),
            'march_denied' => count($march_denied),
            'april_denied' => count($april_denied),
            'may_denied' => count($may_denied),
            'june_denied' => count($june_denied),
            'july_denied' => count($july_denied),
            'agust_denied' => count($agust_denied),
            'september_denied' => count($september_denied),
            'october_denied' => count($october_denied),
            'november_denied' => count($november_denied),
            'december_denied' => count($december_denied),

            'january_wait' => count($january_wait_admin) + count($january_wait_it),
            'february_wait' => count($february_wait_admin) + count($february_wait_it),
            'march_wait' => count($march_wait_admin) + count($march_wait_it),
            'april_wait' => count($april_wait_admin) + count($april_wait_it),
            'may_wait' => count($may_wait_admin) + count($may_wait_it),
            'june_wait' => count($june_wait_admin) + count($june_wait_it),
            'july_wait' => count($july_wait_admin) + count($july_wait_it),
            'agust_wait' => count($agust_wait_admin) + count($agust_wait_it),
            'september_wait' => count($september_wait_admin) + count($september_wait_it),
            'october_wait' => count($october_wait_admin) + count($october_wait_it),
            'november_wait' => count($november_wait_admin) + count($november_wait_it),
            'december_wait' => count($december_wait_admin) + count($december_wait_it),
        ]);
    }

    public function email()
    {
        return view('admin.email.index');
    }
}
