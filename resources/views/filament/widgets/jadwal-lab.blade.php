<x-filament::card>
    <div class="text-center mb-4">
        <h2 class="text-lg font-bold">Jadwal Kegiatan Lab</h2>
    </div>
    <div class="w-full">
        <table class="table-auto border-collapse border border-red-300 w-full text-sm">
            <thead>
                <tr>
                    <th class="border border-red-300 px-4 py-2">Sesi</th>
                    <th class="border border-red-300 px-4 py-2">Jam</th>
                    <th class="border border-red-300 px-4 py-2">Senin</th>
                    <th class="border border-red-300 px-4 py-2">Selasa</th>
                    <th class="border border-red-300 px-4 py-2">Rabu</th>
                    <th class="border border-red-300 px-4 py-2">Kamis</th>
                    <th class="border border-red-300 px-4 py-2">Jum'at</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($jadwal as $sesi => $days)
                    <tr>
                        <td class="border border-red-300 px-4 py-2 text-center">{{ $sesi }}</td>
                        <td class="border border-red-300 px-4 py-2 text-center">
                            {{ $days->first()->jam ?? '-' }}
                        </td>
                        @foreach ([1 => 'Senin', 2 => 'Selasa', 3 => 'Rabu', 4 => 'Kamis', 5 => "Jum'at"] as $dayNumber => $dayName)
                            <td class="border border-red-300 px-4 py-2 text-center">
                                {{ isset($days[$dayNumber]) && $days[$dayNumber]->status == 1 ? 'Digunakan' : '-' }}
                            </td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-filament::card>
