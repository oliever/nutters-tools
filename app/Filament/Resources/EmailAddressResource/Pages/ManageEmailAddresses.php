<?php

namespace App\Filament\Resources\EmailAddressResource\Pages;

use App\Filament\Resources\EmailAddressResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageEmailAddresses extends ManageRecords
{
    protected static string $resource = EmailAddressResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
