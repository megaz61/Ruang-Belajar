@extends('layout.user')
@section('title', 'dashboard')
@section('tabel1', 'active')
@section('content')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <div class="content-wrapper">
        <div class="row">
            {{-- Basic Table --}}
            {{-- <div class="col-lg-6 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Basic Table</h4>
            <p class="card-description">
              Add class <code>.table</code>
            </p>
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th>Profile</th>
                    <th>VatNo.</th>
                    <th>Created</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Jacob</td>
                    <td>53275531</td>
                    <td>12 May 2017</td>
                    <td><label class="badge badge-danger">Pending</label></td>
                  </tr>
                  <tr>
                    <td>Messsy</td>
                    <td>53275532</td>
                    <td>15 May 2017</td>
                    <td><label class="badge badge-warning">In progress</label></td>
                  </tr>
                  <tr>
                    <td>John</td>
                    <td>53275533</td>
                    <td>14 May 2017</td>
                    <td><label class="badge badge-info">Fixed</label></td>
                  </tr>
                  <tr>
                    <td>Peter</td>
                    <td>53275534</td>
                    <td>16 May 2017</td>
                    <td><label class="badge badge-success">Completed</label></td>
                  </tr>
                  <tr>
                    <td>Dave</td>
                    <td>53275535</td>
                    <td>20 May 2017</td>
                    <td><label class="badge badge-warning">In progress</label></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div> --}}
            {{-- end Basic Table --}}
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card" style="border-radius:10px;box-shadow: rgba(136, 165, 191, 0.48) 6px 2px 16px 0px, rgba(255, 255, 255, 0.8) -6px -2px 16px 0px;">
                    <div class="card-body">
                        <h4 class="card-title">MATERI</h4>
                        <p class="card-description">
                            Add class <code>.table-hover</code>
                        </p>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama/Judul Materi</th>
                                        <th>Tingkat Pendidikan</th>
                                        <th>Kelas</th>
                                        <th>Topik</th>
                                        <th>Tipe File Materi</th>
                                        <th>Settings</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($materi as $item)
                                        <tr>
                                            <td>
                                                {{-- buat nomor otomatis dari nomor 1 sampai seterusnya --}}
                                                {{ $loop->iteration }}
                                            </td>
                                            <td>{{ $item->nama_materi }}</td>
                                            <td>{{ $item->tingkatan_pendidikan }}</td>
                                            <td>{{ $item->kelas }}</td>
                                            <td>{{ $item->topik }}</td>
                                            <td>{{ $item->tipe_materi }}</td>
                                            <td class="d-flex">
                                                @if ($item->tipe_materi == 'gambar')
                                                    <a href="{{ asset('materi/gambar/' . $item->file) }}"
                                                        class="btn btn-success text-white mr-2" target="_blank">Preview</a>
                                                    {{-- download image --}}
                                                @elseif ($item->tipe_materi == 'dokumen')
                                                    <a href="{{ route('showPDF', $item->id) }}" target="_blank"
                                                        class=" btn btn-success text-white mr-2">Preview</a>
                                                @elseif ($item->tipe_materi == 'video')
                                                    <a href="{{ route('showVideo', $item->id) }}" target="_blank"
                                                        class="btn btn-success text-white mr-2">Preview</a>
                                                    {{-- @elseif ($item->tipe_materi == 'video')
                              <a href="{{ route('materi/video/', $item->id) }}" target="_blank" class="btn btn-primary">View Materi</a> --}}
                                                @endif
                                                <a href="{{ route('editMateri', $item->id) }}" class="btn btn-warning text-white mr-2">Edit</a>
                                                <form id="deleteForm_{{ $item->id }}"
                                                    action="{{ route('destroy', $item->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" class="btn btn-danger text-white"
                                                        onclick="confirmDelete('{{ $item->id }}')">Delete</button>
                                                </form>
                                                <script>
                                                    function confirmDelete(itemId) {
                                                        Swal.fire({
                                                            title: "Are you sure?",
                                                            text: "Anda Yakin Mau Hapus Materi?",
                                                            icon: "warning",
                                                            showCancelButton: true,
                                                            confirmButtonColor: "#3085d6",
                                                            cancelButtonColor: "#d33",
                                                            confirmButtonText: "Ya, Hapus!"
                                                        }).then((result) => {
                                                            if (result.isConfirmed) {
                                                                // Submit the form
                                                                document.getElementById('deleteForm_' + itemId).submit();
                                                            }
                                                        });
                                                    }
                                                </script>

                                                {{-- <a href="" class="btn btn-danger text-white" >Delete</a> --}}
                                            </td>

                                            {{-- <td class="text-danger"> 28.76% <i class="ti-arrow-down"></i></td> --}}
                                            {{-- <td><label class="badge badge-danger">Pending</label></td> --}}
                                        </tr>
                                    @endforeach
                                </tbody>
                                {!! $materi->withQueryString()->links('pagination::bootstrap-5') !!}
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Stripped Table --}}
            {{-- <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Striped Table</h4>
            <p class="card-description">
              Add class <code>.table-striped</code>
            </p>
            <div class="table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>
                      User
                    </th>
                    <th>
                      First name
                    </th>
                    <th>
                      Progress
                    </th>
                    <th>
                      Amount
                    </th>
                    <th>
                      Deadline
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td class="py-1">
                      <img src="../../images/faces/face1.jpg" alt="image"/>
                    </td>
                    <td>
                      Herman Beck
                    </td>
                    <td>
                      <div class="progress">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </td>
                    <td>
                      $ 77.99
                    </td>
                    <td>
                      May 15, 2015
                    </td>
                  </tr>
                  <tr>
                    <td class="py-1">
                      <img src="../../images/faces/face2.jpg" alt="image"/>
                    </td>
                    <td>
                      Messsy Adam
                    </td>
                    <td>
                      <div class="progress">
                        <div class="progress-bar bg-danger" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </td>
                    <td>
                      $245.30
                    </td>
                    <td>
                      July 1, 2015
                    </td>
                  </tr>
                  <tr>
                    <td class="py-1">
                      <img src="../../images/faces/face3.jpg" alt="image"/>
                    </td>
                    <td>
                      John Richards
                    </td>
                    <td>
                      <div class="progress">
                        <div class="progress-bar bg-warning" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </td>
                    <td>
                      $138.00
                    </td>
                    <td>
                      Apr 12, 2015
                    </td>
                  </tr>
                  <tr>
                    <td class="py-1">
                      <img src="../../images/faces/face4.jpg" alt="image"/>
                    </td>
                    <td>
                      Peter Meggik
                    </td>
                    <td>
                      <div class="progress">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </td>
                    <td>
                      $ 77.99
                    </td>
                    <td>
                      May 15, 2015
                    </td>
                  </tr>
                  <tr>
                    <td class="py-1">
                      <img src="../../images/faces/face5.jpg" alt="image"/>
                    </td>
                    <td>
                      Edward
                    </td>
                    <td>
                      <div class="progress">
                        <div class="progress-bar bg-danger" role="progressbar" style="width: 35%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </td>
                    <td>
                      $ 160.25
                    </td>
                    <td>
                      May 03, 2015
                    </td>
                  </tr>
                  <tr>
                    <td class="py-1">
                      <img src="../../images/faces/face6.jpg" alt="image"/>
                    </td>
                    <td>
                      John Doe
                    </td>
                    <td>
                      <div class="progress">
                        <div class="progress-bar bg-info" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </td>
                    <td>
                      $ 123.21
                    </td>
                    <td>
                      April 05, 2015
                    </td>
                  </tr>
                  <tr>
                    <td class="py-1">
                      <img src="../../images/faces/face7.jpg" alt="image"/>
                    </td>
                    <td>
                      Henry Tom
                    </td>
                    <td>
                      <div class="progress">
                        <div class="progress-bar bg-warning" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </td>
                    <td>
                      $ 150.00
                    </td>
                    <td>
                      June 16, 2015
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div> --}}
            {{-- End Stripped Table --}}
            {{-- Bordered table --}}
            {{-- <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Bordered table</h4>
            <p class="card-description">
              Add class <code>.table-bordered</code>
            </p>
            <div class="table-responsive pt-3">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>
                      #
                    </th>
                    <th>
                      First name
                    </th>
                    <th>
                      Progress
                    </th>
                    <th>
                      Amount
                    </th>
                    <th>
                      Deadline
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>
                      1
                    </td>
                    <td>
                      Herman Beck
                    </td>
                    <td>
                      <div class="progress">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </td>
                    <td>
                      $ 77.99
                    </td>
                    <td>
                      May 15, 2015
                    </td>
                  </tr>
                  <tr>
                    <td>
                      2
                    </td>
                    <td>
                      Messsy Adam
                    </td>
                    <td>
                      <div class="progress">
                        <div class="progress-bar bg-danger" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </td>
                    <td>
                      $245.30
                    </td>
                    <td>
                      July 1, 2015
                    </td>
                  </tr>
                  <tr>
                    <td>
                      3
                    </td>
                    <td>
                      John Richards
                    </td>
                    <td>
                      <div class="progress">
                        <div class="progress-bar bg-warning" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </td>
                    <td>
                      $138.00
                    </td>
                    <td>
                      Apr 12, 2015
                    </td>
                  </tr>
                  <tr>
                    <td>
                      4
                    </td>
                    <td>
                      Peter Meggik
                    </td>
                    <td>
                      <div class="progress">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </td>
                    <td>
                      $ 77.99
                    </td>
                    <td>
                      May 15, 2015
                    </td>
                  </tr>
                  <tr>
                    <td>
                      5
                    </td>
                    <td>
                      Edward
                    </td>
                    <td>
                      <div class="progress">
                        <div class="progress-bar bg-danger" role="progressbar" style="width: 35%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </td>
                    <td>
                      $ 160.25
                    </td>
                    <td>
                      May 03, 2015
                    </td>
                  </tr>
                  <tr>
                    <td>
                      6
                    </td>
                    <td>
                      John Doe
                    </td>
                    <td>
                      <div class="progress">
                        <div class="progress-bar bg-info" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </td>
                    <td>
                      $ 123.21
                    </td>
                    <td>
                      April 05, 2015
                    </td>
                  </tr>
                  <tr>
                    <td>
                      7
                    </td>
                    <td>
                      Henry Tom
                    </td>
                    <td>
                      <div class="progress">
                        <div class="progress-bar bg-warning" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </td>
                    <td>
                      $ 150.00
                    </td>
                    <td>
                      June 16, 2015
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div> --}}
            {{-- end Bordered table --}}
            {{-- Inverse table --}}
            {{-- <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Inverse table</h4>
            <p class="card-description">
              Add class <code>.table-dark</code>
            </p>
            <div class="table-responsive pt-3">
              <table class="table table-dark">
                <thead>
                  <tr>
                    <th>
                      #
                    </th>
                    <th>
                      First name
                    </th>
                    <th>
                      Amount
                    </th>
                    <th>
                      Deadline
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>
                      1
                    </td>
                    <td>
                      Herman Beck
                    </td>
                    <td>
                      $ 77.99
                    </td>
                    <td>
                      May 15, 2015
                    </td>
                  </tr>
                  <tr>
                    <td>
                      2
                    </td>
                    <td>
                      Messsy Adam
                    </td>
                    <td>
                      $245.30
                    </td>
                    <td>
                      July 1, 2015
                    </td>
                  </tr>
                  <tr>
                    <td>
                      3
                    </td>
                    <td>
                      John Richards
                    </td>
                    <td>
                      $138.00
                    </td>
                    <td>
                      Apr 12, 2015
                    </td>
                  </tr>
                  <tr>
                    <td>
                      4
                    </td>
                    <td>
                      Peter Meggik
                    </td>
                    <td>
                      $ 77.99
                    </td>
                    <td>
                      May 15, 2015
                    </td>
                  </tr>
                  <tr>
                    <td>
                      5
                    </td>
                    <td>
                      Edward
                    </td>
                    <td>
                      $ 160.25
                    </td>
                    <td>
                      May 03, 2015
                    </td>
                  </tr>
                  <tr>
                    <td>
                      6
                    </td>
                    <td>
                      John Doe
                    </td>
                    <td>
                      $ 123.21
                    </td>
                    <td>
                      April 05, 2015
                    </td>
                  </tr>
                  <tr>
                    <td>
                      7
                    </td>
                    <td>
                      Henry Tom
                    </td>
                    <td>
                      $ 150.00
                    </td>
                    <td>
                      June 16, 2015
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div> --}}
            {{-- end Inverse table --}}
            {{-- Table with contextual classes --}}
            {{-- <div class="col-lg-12 stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Table with contextual classes</h4>
            <p class="card-description">
              Add class <code>.table-{color}</code>
            </p>
            <div class="table-responsive pt-3">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>
                      #
                    </th>
                    <th>
                      First name
                    </th>
                    <th>
                      Product
                    </th>
                    <th>
                      Amount
                    </th>
                    <th>
                      Deadline
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <tr class="table-info">
                    <td>
                      1
                    </td>
                    <td>
                      Herman Beck
                    </td>
                    <td>
                      Photoshop
                    </td>
                    <td>
                      $ 77.99
                    </td>
                    <td>
                      May 15, 2015
                    </td>
                  </tr>
                  <tr class="table-warning">
                    <td>
                      2
                    </td>
                    <td>
                      Messsy Adam
                    </td>
                    <td>
                      Flash
                    </td>
                    <td>
                      $245.30
                    </td>
                    <td>
                      July 1, 2015
                    </td>
                  </tr>
                  <tr class="table-danger">
                    <td>
                      3
                    </td>
                    <td>
                      John Richards
                    </td>
                    <td>
                      Premeire
                    </td>
                    <td>
                      $138.00
                    </td>
                    <td>
                      Apr 12, 2015
                    </td>
                  </tr>
                  <tr class="table-success">
                    <td>
                      4
                    </td>
                    <td>
                      Peter Meggik
                    </td>
                    <td>
                      After effects
                    </td>
                    <td>
                      $ 77.99
                    </td>
                    <td>
                      May 15, 2015
                    </td>
                  </tr>
                  <tr class="table-primary">
                    <td>
                      5
                    </td>
                    <td>
                      Edward
                    </td>
                    <td>
                      Illustrator
                    </td>
                    <td>
                      $ 160.25
                    </td>
                    <td>
                      May 03, 2015
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div> --}}
            {{-- end Table with contextual classes --}}
        </div>
    </div>
@endsection
