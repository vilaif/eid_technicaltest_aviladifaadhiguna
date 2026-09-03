<x-filament-panels::page>
    {{ $this->form }}

    <div style="margin-top: 16px;">
        <button wire:click="generateReport" type="button"
            style="background-color: #f59e0b; color: white; padding: 8px 16px; border-radius: 6px; border: none; cursor: pointer;">
            Generate Laporan
        </button>
    </div>

    <div class="margin-top: 24px;">
        <table style="width: 100%; border-collapse: collapse; font-size: 14px;">
            <thead>
                <tr>
                    <th style="padding: 8px 12px; text-align: left; border: 1px solid #d1d5db;">Mesin</th>
                    <th style="padding: 8px 12px; text-align: left; border: 1px solid #d1d5db;">Shift</th>
                    <th style="padding: 8px 12px; text-align: left; border: 1px solid #d1d5db;">Tanggal</th>
                    <th style="padding: 8px 12px; text-align: left; border: 1px solid #d1d5db;">Total Produksi</th>
                    <th style="padding: 8px 12px; text-align: left; border: 1px solid #d1d5db;">Rata-rata Temperature
                    </th>
                    <th style="padding: 8px 12px; text-align: left; border: 1px solid #d1d5db;">Jumlah Operator</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($reportData as $row)
                <tr class="border-t border-gray-200 dark:border-gray-700">
                    <td style="padding: 8px 12px; border: 1px solid #d1d5db;">{{ $row['machine']['name'] ?? '-' }}</td>
                    <td style="padding: 8px 12px; border: 1px solid #d1d5db;">{{ $row['shift'] }}</td>
                    <td style="padding: 8px 12px; border: 1px solid #d1d5db;">{{ $row['log_date'] }}</td>
                    <td style="padding: 8px 12px; border: 1px solid #d1d5db;">{{ $row['total_qty'] }}</td>
                    <td style="padding: 8px 12px; border: 1px solid #d1d5db;">
                        {{ number_format($row['avg_temperature']) }}
                        °C
                    </td>
                    <td style="padding: 8px 12px; border: 1px solid #d1d5db;">{{ $row['total_operators'] }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="5"
                        style="padding: 16px; text-align: center; color: #6b7280; border: 1px solid #d1d5db;">Tidak ada
                        data untuk filter ini.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-filament-panels::page>