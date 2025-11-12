<?php

namespace App\Exports;

use App\Models\Code;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CodeExport implements FromCollection, WithHeadings
{
    private $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $dateTimeFormat = basicControl()->date_time_format;

        return Code::with(['duration', 'user'])
            ->where('codeable_type', $this->data['codeable_type'])
            ->where('codeable_id', $this->data['codeable_id'])
            ->orderBy('id', 'desc')
            ->get()
            ->map(function ($query) use ($dateTimeFormat) {
                return [
                    'Code' => $query->passcode,
                    'Duration' => $query->duration ? $query->duration->name : 'N/A',
                    'Status' => $query->status == 1 ? 'Available' : 'Sold',
                    'User' => $query->user ? $query->user->username : 'N/A',
                    'Activated At' => $query->activated_at ? dateTime($query->activated_at, $dateTimeFormat) : 'Not Activated',
                    'Expires At' => $query->expires_at ? dateTime($query->expires_at, $dateTimeFormat) : 'N/A',
                    'Created At' => dateTime($query->created_at, $dateTimeFormat),
                ];
            });
    }

    public function headings(): array
    {
        return [
            'Code',
            'Duration',
            'Status',
            'User',
            'Activated At',
            'Expires At',
            'Created At',
        ];
    }
}
