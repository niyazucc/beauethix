@php
$data_index = [
    'Tapak dimana projek akan dijalankan',
    'Kedudukan syarikat (samada sudah ditubuhkan atau belum untuk menjalankan projek komersial ).',
    'Nama syarikat ',
    'Taraf syarikat (syarikat berhad/sendirian berhad ).',
    'Nombor dan tarikh pendaftaran syarikat.',
    'Alamat dan nombor telefon syarikat.',
    'Jumlah modal yang diluluskan.',
    'Jumlah modal permulaan yang dibayar/terkumpul.',
    'Modal berbayar mestilah melebihi RM 500,000.00',
    'Jumlah modal permulaan yang diperlukan.',
    'Sumber modal (sekiranya syarikat tidak mempunyai modal yang cukup, bagaimanakah cara untuk mendapatkan modal tersebut).',
    'Sertakan satu salinan ‘Memorandum and Articles of Association’ dan ‘Certificate of Incorporation’, Borang 24 dan Borang 49 bagi syarikat sendirian berhad.',
    'Sekiranya terdapat perubahan/pertukaran di dalam pemegang saham atau Lembaga Pengarah, sila sertakan borang-borang berkenaan yang dikemaskini.',
    'Nyatakan bilangan tenaga pekerja yang akan digunakan mengikut peringkat-peringkat pekerjaan.',
    'Nyatakan bentuk-bentuk ganjaran/kebajikan yang akan diberikan kepada para pekerja seperti insentif, perubatan percuma, insuran berkelompok dan sebagainya.',
    'Butir-butir ahli-ahli Lembaga Pengarah/ Pengurus:-',
    'Pengalaman Pengarah Urusan/ Pengurus di dalam bidang perusahaan yang dipohon.',
    'Senarai harta-harta yang dipunyai oleh Lembaga Pengarah.',
    'Butir-butir pemegang saham yang lain.',
    'Senarai pertangguhan harta syarikat serta kembarkan salinan dokumen ‘title’ nya.',
    'Nama bank dan nombor akaun syarikat.',
    'Cara pengurusan/ pentadbiran akaun syarikat.',
    'Bagi fasa pembangunan (kerja-kerja awalan) mesti melibatkan sekuarang-kurang 50% kontraktor bumiputra tempatan',
    'Kertaskerja yang lengkap bagi perusahaan yang dipohon. Kertaskerja tersebut hendaklah mengandungi perkara-perkara berikut dengan secara terperinci:-'
];

$data_1_parent = [
    'Jika Tanah Milik',
    'Jika Tanah Kerajaan'
];

$data_1_child = array(
    array(
        'Nyatakan keterangan tanah seperti nombor lot, nombor hakmilik, mukim dan juga daerah dan kembarkan salinan hakmilik tanah serta pelan kunci tanah berkenaan.'
    ),
    array(
        'Sila kembarkan pelan tapak dan pelan kunci yang disahkan oleh juruukur swasta atau Pentadbir-pentadbir Tanah berkenaan.',
        'Tanah Seluas 4 hektar dan keatas sahaja layak bagi permohonan projek pertanian komersial.'
    )
);

$data_16 = [
    'Nama',
    'No.Kad Pengenalan',
    'Alamat',
    'Pangkat dalam syarikat/perniagaan',
    'Pekerjaan tetap dan pendapatan',
    'Lain-lain pekerjaan dan pendapatan',
    'Pendapatan dari sumber-sumber lain',
    'Nama bank dan nombor akaun bank',
    'Jumlah saham yang dimiliki dalam syarikat',
    'Harta yang dimiliki (sertakan salinan dokumen yang berkenaan)'
];

$data_19 = [
    'Nama',
    'No.Kad Pengenalan',
    'Alamat',
    'Pekerjaan tetap dan pendapatan',
    'Jumlah saham yang dimiliki dalam syarikat'
];

$data_24_parent = [
    'Tujuan',
    'Latarbelakang',
    'Huraian Projek',
    'Anggaran Kos dan Pendapatan',
    'Justifikasi'
];

$data_24_child = [
    'Tujuan kertaskerja yang dikemukakan hendaklah disebut dengan terang.',
    'Hendaklah menyatakan keadaan-keadaan yang memerlukan projek yang dipohonkan itu dijalankan.',
    'Hendaklah membentangkan dengan secara terperinci mengenai projek yang dicadangkan serta juga peringkat-peringkat proses pengeluaran.',
    'Semua kos dan pendapatan yang terlibat dalam melaksanakan projek ini hendaklah dibentang. Penyata anggaran Untung Rugi serta Jangkaan Aliran Wang (Cash Flow Projection) hendaklah dibentangkan.',
    'Hendaklah dikemukakan dari segi ‘economic viability’ dan ‘technical feasibility’. Kesan-kesan lain yang diujudkan daripada projek tersebut terutama dari segi sosial hendaklah dikemukakan juga. Sekiranya terdapat kajian ‘pre-feasibility’ atau ‘feasibility’ terutamanya kajian ke atas pasaran atau kajian kesan ke atas alam sekeliling (environmental impact study), laporan-laporan berkenaan hendaklah dikemukakan juga.',
];

$ingatan = [
    'Pemohon-pemohon hendaklah melantik jurukur swasta mengikut arahan Pentadbir-pentadbir Tanah jika permohonan berkenaan melibatkan tanah yang luas.',
    'Bagi projek pelancongan di sekitar sempadan Santuari Penyu Rantau Abang akan dirujuk kepada Majlis Penasihat Santuari Penyu yang akan mengenakan syarat antara lain bangunan tidak boleh melebihi dua (2) tingkat.',
    'Pemohon-pemohon hendaklah mematuhi semua keperluan dan garis panduan yang dikemukakan oleh jabatan-jabatan teknikal. Permohonan projek pelancongan di atas tanah kerajaan di Pulau Perhentian dan Pulau Redang adalah ditutup.',
    'Permohonan yang lengkap dengan maklumat yang dikehendaki sahaja akan diproses dan taklimat oleh pemohon kepada Jawatankuasa akan dimaklumkan jika didapati perlu.',
    'Setiap permohonan yang diluluskan hanya sah untuk tempoh yang dinyatakan. Adalah menjadi tugas pemohon merayu disambung tempoh kelulusan dengan dinyatakan alasannya. Jika tidak, kelulusan tersebut dianggap terbatal secara automatik.',
];

@endphp


<div class="space-y-6">
    <div class="font-bold flex pb-2 align-middle text-center flex-col">
        GARIS PANDUAN PERMOHONAN TANAH KERAJAAN BAGI PEMBANGUNAN PROJEK KOMERSIAL DI NEGERI TERENGGANU
    </div>

    <div class="space-y-4">
        <table>
            @foreach ($data_index as $data)
                <tr>
                    <td class="w-10 flex justify-start items-start">
                        {{ $loop->iteration }}.
                    </td>
                    <td class="pb-2">
                        <div>
                            {{ $data }}
                        </div>

                        @if ($loop->iteration == 1)
                            @foreach ($data_1_child as $key=>$data_1p)
                                <div class="py-2 flex flex-row">
                                    <div class="font-bold">
                                        {{ chr(96+ $loop->iteration) }}.
                                    </div>
                                    <div class="pl-2 space-y-2">
                                        <div class="font-bold">
                                            {{ $data_1_parent[$key] }}
                                        </div>
                                        <div class="space-y-2">
                                            <table>
                                                @foreach ($data_1p as $key2=>$data_1c)
                                                    <tr>
                                                            @if ($key == 0 && $key2 == 0)
                                                                <td>
                                                                    {{ $data_1c }}
                                                                </td>
                                                            @else
                                                                    <td class="w-10 flex justify-start items-start">
                                                                      
                                                                    </td>
                                                                    <td class="pb-2">
                                                                        {{ $data_1c }}
                                                                    </td>
                                                                </div>
                                                            @endif
                                                    </tr>
                                                @endforeach
                                            </table>
                                        </div>
                                    </div>
                                </div>

                            @endforeach
                        @elseif ($loop->iteration == 16)
                            <table class="my-2">
                                @foreach ($data_16 as $data16)
                                    <tr>
                                        <td class="w-8 flex justify-start items-start">
                                            {{ chr(96+ $loop->iteration) }}.
                                        </td>
                                        <td>
                                            {{ $data16 }}
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        @elseif ($loop->iteration == 19)
                            <table class="my-2">
                                @foreach ($data_19 as $data19)
                                    <tr>
                                        <td class="w-8 flex justify-start items-start">
                                            {{ chr(96+ $loop->iteration) }}.
                                        </td>
                                        <td>
                                            {{ $data19 }}
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        @elseif ($loop->iteration == 24)
                            <table class="my-2">
                                @foreach ($data_24_parent as $key=>$data_24p)
                                <tr>
                                    <td class="font-bold w-10 flex justify-start items-start">
                                        .
                                    </td>
                                    <td class="pb-2">
                                        <div class="font-bold underline pb-2">
                                            {{ $data_24p }}
                                        </div>
                                        <div>
                                            {{ $data_24_child[$key] }}
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </table>
                        @endif
                    </td>
                </tr>
            @endforeach
        </table>
    </div>

    <div class="font-bold">
        INGATAN:
    </div>
    <table>
        @foreach ($ingatan as $ingat)
            <tr>
                <td class="w-10 flex justify-start items-start">
                    {{ chr(96+ $loop->iteration) }}.
                </td>
                <td class="pb-2">
                    {{ $ingat }}
                </td>
            </tr>
        @endforeach
    </table>
</div>