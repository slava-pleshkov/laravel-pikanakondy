@extends('site.layouts.main')

@section('title',__('site.profile-title'))

@section('content')
    <section class="s-content s-content--top-padding s-content--narrow">

        <div class="row narrow">
            <div class="col-full s-content__header">
                <h1 class="display-1 display-1--with-line-sep">{{ __('site.profile-title') }}</h1>
            </div>
        </div>
        <div class="row">
            @include('site.includes.success')
            <table class="table">
                <tr>
                    <th>{{ __('site.profile-images') }}</th>
                    <td>
                        <img src="{{ Gravatar::get($main->email) }}">
                        <p>Manage your avatar using <a href="https://gravatar.com" target="_blank" class="hk-link">Gravatar</a>.</p>
                    </td>
                </tr>
                <tr>
                    <th>{{ __('site.profile-name') }}</th>
                    <td>{{ $main->name }}</td>
                </tr>
                <tr>
                    <th>{{ __('site.profile-email') }}</th>
                    <td>{{ $main->email }}</td>
                </tr>
                <tr>
                    <th>{{ __('site.profile-about') }}</th>
                    <td>{{ $main->about }}</td>
                </tr>
                <tr>
                    <th>{{ __('site.profile-password') }}</th>
                    <td>
                        @if( $main->password )
                            {{ __('site.enabled') }}
                        @else
                            {{ __('site.disabled') }}
                        @endif</td>
                </tr>
                <tr>
                    <th>{{ __('site.profile-role') }}</th>
                    <td>{{ $main->role->name }}</td>
                </tr>
            </table>
            <div class="text-center">

                <a href="{{ route('profile.edit',$main->id) }}" class="submit btn btn--primary btn--large">{{ __('site.profile-edit-profile') }}</a>
                <a href="{{ route('profile.password',$main->id) }}" class="submit btn btn--primary btn--large">{{ __('site.profile-edit-password') }}</a>
                <form action="{{ route('profile.destroy',$main->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="submit btn btn--primary btn--large" onclick="if(!confirm('{{ __('admin.trash') }}')) return false;">{{ __('site.profile-delete-user') }}</button>
                </form>
            </div>

        </div>
    </section>

@endsection
