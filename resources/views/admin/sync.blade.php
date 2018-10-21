@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-5">
            <h3 class="modal-title">{{ __('Sync State') }}</h3>
        </div>
        <div class="col-md-7 page-action text-right">
            <!-- @can('add_users')
                <a href="{{ route('admin.users.create') }}" class="btn btn-primary btn-sm"> <i class="fa fa-plus"></i> {{ __('Create') }}</a>
            @endcan -->
        </div>
    </div>

    <div class="row">
        <p>In der folgenden Liste sind die Datenquellen für diese Seite gelistet. Der Status ist jeweils das Ergebnis der letzten Aktualisierung.</p>
        <p>Jeder registrierte Benutzer kann grundsätzlich eine Aktualisierung für die verschiedenen Daten anstoßen.
            Um Missbrauch und eine unnötige Belastung der Quellserver zu vermeiden, sind verschiedene Abklingzeiten hinterlegt.
            Bspw. werden die meisten Daten nur neu angefordert, wenn der bestehende Datenbestand älter als 1 Tag ist.</p>
        <p>Gelegentlich werden bei der Synchronisation Fehler auftreten.
            Dies kann etwa daraus resultieren, dass der angefragte Server nicht verfügbar ist.
            Auch kommt es vor, dass auf der Gegenseite die Struktur der Daten geändert wird, was zu Fehlern bei der Verarbeitung führt und Anpassungen auf dieser Seite erfordert.</p>
        <p>Auffälligkeiten gern melden.</p>
    </div>

    <div class="row">
        <table class="table table-bordered table-striped table-hover">
            <thead>
            <tr>
                <th>{{ __('No') }}</th>
                <th>{{ __('Target') }}</th>
                <th>{{ __('Time') }}</th>
                <th>{{ __('Size') }}</th>
                <th>{{ __('State') }}</th>
                <th>{{ __('Details') }}</th>
                @hasanyrole('admin|leader|officer|member')
                <th class="text-center" style="min-width:4.5rem;">{{ __('Actions') }}</th>
                @endhasanyrole
            </tr>
            </thead>
            <tbody>
            @foreach($targets as $key => $description)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $description ?: $key }}</td>
                        @if( ! isset($sync_status[$key]) || ! is_array($sync_status[$key]))
                            <td>-</td><td>-</td><td>-</td><td>{{ $sync_status[$key] ?? '-' }}</td>
                        @else
                            <td>{{ isset($sync_status[$key]['time']) ? gmdate("d.m.y H:i", $sync_status[$key]['time']) : '-' }}</td>
                            <td class="text-right">{{ isset($sync_status[$key]['size']) && is_int($sync_status[$key]['size']) ? number_format($sync_status[$key]['size']) : '-' }}</td>
                            <td>{{ $sync_status[$key]['status'] ?? '-' }}</td>
                            <td>{{ $sync_status[$key]['url'] ?? '-' }}
                            @role('admin')
                                <br />{{ isset($sync_status[$key]['error']) ? $sync_status[$key]['error'] : '-' }}
                            @endrole
                            </td>
                        @endif
                    @hasanyrole('admin|leader|officer|member')
                    <td class="text-center">
                    {!! Form::open( ['method' => 'post', 'url' => route('sync'), 'style' => 'display: inline']) !!}
                        {!! Form::hidden('sync', $key) !!}
                        @if($key == 'clear')
                        @role('admin')
                        <button type="submit" class="btn btn-sm btn-danger">
                            <i class="fa fa-trash"></i>
                        </button>
                        @endrole
                        @elseif($key == 's')
                        @role('admin')
                        <button type="submit" class="btn btn-sm btn-danger" name="force" value="true">
                            <i class="fa fa-refresh"></i>
                        </button>
                        @endrole
                        @else
                        <button type="submit" class="btn btn-sm btn-info">
                            <i class="fa fa-refresh"></i>
                        </button>
                        @role('admin')
                        <button type="submit" class="btn btn-sm btn-danger" name="force" value="true">
                            <i class="fa fa-refresh"></i>
                        </button>
                        @endrole
                        @endif
                    {!! Form::close() !!}
                    </td>
                    @endhasanyrole
                </tr>
            @endforeach
            </tbody>
        </table>

        <div class="text-left">{{ __('Server Time') }} ({{ date("e", time()) }})
            <ul>
            <li class="">{{ gmdate("d.m.y H:i", time()) }}</li>
            <li class="">{{ date("c", time()) }}</li>
            <li class="">{{ date("r", time()) }}</li>
            </ul>
        </div>

        <div class="text-left">
        @role('admin')
            @if(isset($sync_status['error']) && is_array($sync_status['error']))
                {{ implode(', ', $sync_status['error']) }}
            @else
                {{ $sync_status['error'] ?? '-' }}
            @endif
        @endrole
        </div>
    </div>
</div>
@endsection
