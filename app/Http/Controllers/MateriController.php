<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Materi;
// use dompdf
use Dompdf\Dompdf;
use PhpParser\Node\NullableType;
use RealRashid\SweetAlert\Facades\Alert;

class MateriController extends Controller
{
    public function store(Request $request, $id)
    {
        // Validasi input
        $validatedData = $request->validate([
            'nama_materi' => 'required',
            'tingkatan_pendidikan' => 'required',
            'kelas' => 'required',
            'tipe_materi' => 'required',
            'keterangan' => 'required',
            'topik' => 'required|array|min:1',
            'topik.*' => 'string',
            'thumbnail' => 'nullable|mimes:jpg,png',
            'sumber' => 'nullable',
        ]);
        if ($request->tipe_materi == 'dokumen') {
            $validatedData['file'] = 'required|mimes:pdf';
        } elseif ($request->tipe_materi == 'gambar') {
            $validatedData['file'] = 'required|mimes:jpg,png';
        }

        try {
            // Buat objek Materi
            $materi = new Materi();

            // Temukan user berdasarkan ID
            $user = User::find($id);

            // Setel atribut-atribut materi
            $materi->user_id = $user->id;
            $materi->nama_materi = $validatedData['nama_materi'];
            $materi->tingkatan_pendidikan = $validatedData['tingkatan_pendidikan'];
            $materi->kelas = $validatedData['kelas'];
            $materi->tipe_materi = $validatedData['tipe_materi'];
            $materi->keterangan = $validatedData['keterangan'];
            $materi->sumber = $validatedData['sumber'];
            $materi->topik = implode(',', $request->topik);

            // Tangani upload file (jika ada)
            $file = $request->file('file');
            $pdf = $materi->tipe_materi == 'dokumen';
            $gambar = $materi->tipe_materi == 'gambar';
            $video = $materi->tipe_materi == 'video';
            if ($file && $pdf) {
                $fileName = '(' . $user->username . ')' . '_' . $materi->nama_materi . '.' . $file->getClientOriginalExtension();
                $file->move('materi/pdf', $fileName);
                $materi->file = $fileName;
            } elseif ($file && $video) {
                $fileName = '(' . $user->username . ')' . '_' . $materi->nama_materi . '.' . $file->getClientOriginalExtension();
                $file->move('materi/video', $fileName);
                $materi->file = $fileName;
            } elseif ($file && $gambar) {
                $fileName = '(' . $user->username . ')' . '_' . $materi->nama_materi . '.' . $file->getClientOriginalExtension();
                $file->move('materi/gambar', $fileName);
                $materi->file = $fileName;
            }

            // Tangani upload thumbnail (jika ada)
            $thumbnail = $request->file('thumbnail');
            if ($thumbnail) {
                $thumbnailName = '(' . $user->username . ')' . '_' . $materi->nama_materi . '.' . $thumbnail->getClientOriginalExtension();
                $thumbnail->move('materi/thumbnail', $thumbnailName);
                $materi->thumbnail = $thumbnailName;
            }

            // Simpan materi ke dalam database
            $materi->save();

            // Redirect ke halaman sebelumnya dengan sweet alert success Alert::success('Success Title', 'Success Message');
            Alert::success('Success', 'Data Berhasil Ditambahkan');
            return redirect()->back();
        } catch (\PDOException $e) {
            // Redirect ke halaman sebelumnya dengan pesan error
            Alert::error('Error', 'Gagal menambahkan materi: ' . $e->getMessage());
            return redirect()
                ->back()
                ->with('error', 'Gagal menambahkan materi: ' . $e->getMessage());
        }
    }
    public function index()
    {
        $materi = Materi::paginate(4);
        return view('materi', compact('materi'));
    }

    public function filter(Request $request)
    {
        // Ambil parameter pencarian dari request
        $search = strtolower(trim($request->search));
        $search = str_replace('.', '', $search);
        $search = str_replace(' ', '', $search);

        // Query dasar untuk mencari materi
        $query = Materi::query();

        // Tambahkan kondisi pencarian jika ada
        if ($search !== '') {
            $query->whereRaw('LOWER(REPLACE(REPLACE(nama_materi, " ", ""), ".", "")) LIKE ?', ["%{$search}%"]);
        }

        // Ambil tingkatan pendidikan dan kelas dari request
        $tingkatan_pendidikan = $request->get('tingkatan_pendidikan');
        $kelas = $request->get('kelas');

        // Tambahkan kondisi filter berdasarkan tingkat pendidikan dan kelas jika tidak "none"
        if ($tingkatan_pendidikan != 'none') {
            $query->where('tingkatan_pendidikan', $tingkatan_pendidikan);
        }

        if ($kelas != 'none') {
            $query->where('kelas', $kelas);
        }

        // Eksekusi query dan dapatkan data materi
        $materi = $query->paginate(4);

        // Tampilkan alert jika tidak ada hasil dari pencarian atau filter
        if ($materi->isEmpty()) {
            Alert::info('info', 'Data belum ada atau tidak ditemukan');
        }

        // Kembalikan materi ke view
        return view('materi', compact('materi'));
    }

    public function showpdf($id)
    {
        $materi = Materi::find($id);
        $materi->materi_view += 1;
        $materi->save();
        return view('showPDF', compact('materi'));
        // dompPDF
        // // Get materi by id
        // $materi = Materi::find($id);

        // // Get the Blade template file path.
        // $templatePath = public_path('materi/' . $materi->file);

        // // Create a new Dompdf instance.
        // $dompdf = new Dompdf();

        // // Load the Blade template file.
        // $html = view('showPDF', compact('materi'))->render();

        // // Load HTML content into Dompdf.
        // $dompdf->loadHtml($html);

        // // Set paper size and orientation (optional).
        // $dompdf->setPaper('A4', 'portrait');

        // // Render the PDF.
        // $dompdf->render();

        // // Return the PDF.
        // return $dompdf->stream();

        // dont use dompdf
        // $materi = Materi::find($id); // get materi by id
        // return view('showPDF', compact('materi'));
    }
    public function showvideo($id)
    {
        // Mencari materi berdasarkan ID
        $materi = Materi::find($id);

        // Menambahkan nilai materi_view
        $materi->materi_view += 1;
        $materi->save();

        // Mengembalikan tampilan dengan data materi
        return view('showVideo', compact('materi'));
    }

    public function tabelMateri($id)
    {
        $user = User::find($id);
        $materi = Materi::paginate(5);
        return view('akun.TabelMateri', compact('materi', 'user'));
    }

    public function destroy($id)
    {
        $materi = Materi::find($id);
        if ($materi) {
            $materi->delete();
            Alert::success('Success', 'Data Berhasil Dihapus');
            return redirect()->back();
        } else {
            Alert::error('Error', 'Data Materi Tidak Ditemukan');
            return redirect()->back();
        }
    }
    public function editMateri($id)
    {
        $materi = Materi::find($id);
        return view('akun.FormEditMateri', compact('materi'));
    }

    public function updateMateri(Request $request, $id)
    {
        // Validasi input
        $materis = Materi::find($id);
        $validatedData = $request->validate([
            'nama_materi' => 'required',
            'tingkatan_pendidikan' => 'required',
            'kelas' => 'required',
            'tipe_materi' => 'required',
            'keterangan' => 'required',
            'topik' => 'required|array|min:1',
            'topik.*' => 'string',
            'thumbnail' => 'nullable|mimes:jpg,png',
            'sumber' => 'nullable',
        ]);
        if ($request->tipe_materi == 'dokumen') {
            $validatedData['file'] = 'required|mimes:pdf';
        } elseif ($request->tipe_materi == 'gambar') {
            $validatedData['file'] = 'required|mimes:jpg,png';
        } elseif ($request->tipe_materi == 'video') {
            $validatedData['file'] = 'required|mimes:mp4,mkv,mpeg,webm';
        }
        try {
            $materis->nama_materi = $validatedData['nama_materi'];
            $materis->tingkatan_pendidikan = $validatedData['tingkatan_pendidikan'];
            $materis->kelas = $validatedData['kelas'];
            $materis->tipe_materi = $validatedData['tipe_materi'];
            $materis->keterangan = $validatedData['keterangan'];
            $materis->topik = implode(',', $request->topik);
            $materis->file = $validatedData['file'];
            $materis->thumbnail = $validatedData['thumbnail'];
            $materis->sumber = $validatedData['sumber'];
            // Tangani upload file (jika ada)
            $file = $request->file('file');
            $pdf = $materis->tipe_materi == 'dokumen';
            $gambar = $materis->tipe_materi == 'gambar';
            $video = $materis->tipe_materi == 'video';
            if ($file && $pdf) {
                $fileName = $file->getClientOriginalName();
                $file->move('materi/pdf', $fileName);
                $materis->file = $fileName;
            } elseif ($file && $video) {
                $fileName = $file->getClientOriginalName();
                $file->move('materi/video', $fileName);
                $materis->file = $fileName;
            } elseif ($file && $gambar) {
                $fileName = $file->getClientOriginalName();
                $file->move('materi/gambar', $fileName);
                $materis->file = $fileName;
            }

            // Tangani upload thumbnail (jika ada)
            $thumbnail = $request->file('thumbnail');
            if ($thumbnail) {
                $thumbnailName = $file->getClientOriginalName();
                $thumbnail->move('materi/thumbnail', $thumbnailName);
                $materis->thumbnail = $thumbnailName;
            }
            $user = User::find($id);
            $materis->save();
            Alert::success('Success', 'Data Berhasil Diubah');
            return redirect()->back();
        } catch (\PDOException $e) {
            // Redirect ke halaman sebelumnya dengan pesan error
            Alert::error('Error', 'Gagal menambahkan materi: ' . $e->getMessage());
            return redirect()->back();
        }
    }
}
