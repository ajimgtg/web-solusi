<!-- Footer -->
@php
    use App\Models\Contact;
    $data = Contact::first();
@endphp
<footer>
    <section>
        <div class="container">
            <div class="row" style="padding-top: 50px">
                <div class="col-xl-6">
                    <h5 style="font-weight: bold">Supported by UPN "Veteran" Jawa Timur</h5>
                    <p>Lab Insyde Profesional berfokus memberikan sarana dan prasarana untuk mahasiswa Fakultas Ilmu
                        Komputer.</p>
                </div>
                <div class="col"></div>
                <div class="col"></div>
                <div class="col-xl-4">
                    <h5 style="font-weight: bold">UPN "Veteran" Jawa Timur</h5>
                    @if (empty($data->address))
                        <p style="color: #fff; font-weight: bold">
                            Tidak ada data tersedia
                        </p>
                    @else
                        <p>{{ $data->address }}</p>
                    @endif
                    @if (empty($data->phone))
                        <p style="color: #fff; font-weight: bold">
                            Tidak ada data tersedia
                        </p>
                    @else
                        <p>{{ $data->phone }}</p>
                    @endif
                </div>
            </div>
            <hr />
            <div class="row">
                <div class="col-xl-8" style="padding-top: 15px">Copyright &copy; Fakultas Ilmu Komputer 2025. All
                    Rights Reserved</div>
                <div class="col-xl-4">
                    @if (empty($data->instagram))
                        <p style="color: #fff; font-weight: bold">
                            Tidak ada data tersedia
                        </p>
                    @else
                        <a href="{{ $data->instagram }}" target="_blank"><i class="fa-brands fa-instagram"></i></a>
                    @endif
                    @if (empty($data->whatsapp))
                        <p style="color: #fff; font-weight: bold">
                            Tidak ada data tersedia
                        </p>
                    @else
                        <a href="https://wa.me/{{ $data->whatsapp }}" target="_blank"><i
                            class="fa-brands fa-whatsapp"></i>
                        </a>
                    @endif
                    @if (empty($data->linkedin))
                        <p style="color: #fff; font-weight: bold">
                            Tidak ada data tersedia
                        </p>
                    @else 
                    <a href="{{ $data->linkedin }}" target="_blank"><i class="fa-brands fa-linkedin"></i></a>
                    @endif
                </div>
            </div>
        </div>
    </section>
</footer>
<!-- Akhir Footer -->
