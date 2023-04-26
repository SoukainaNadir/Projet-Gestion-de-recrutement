<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            @if (Laravel\Fortify\Features::canUpdateProfileInformation())
            @if(auth()->user()->role_id==2)
                <table class="table-fixed border-collapse rounded-lg overflow-hidden w-full shadow" >
                    <div class="pb-3 text-lg font-medium text-gray-900">
                        <h3>My Offers</h3>
                    </div>

                    <thead class="bg-[#F9AF16] text-gray-100 uppercase">
                      <tr>
                        <th class="px-4 py-2 w-1/4">Title</th>
                        <th class="px-4 py-2 w-1/4">Description</th>
                        <th class="px-4 py-2 w-1/4">Location</th>
                        <th class="px-4 py-2 w-1/4">Applicants</th>
                        <th class="px-4 py-2 w-1/4">Actions</th>
                    </tr>
                    </thead>
                    <tbody class="bg-white">
                        @foreach (auth()->user()->offers as $offer )
                            <tr>
                                <td class="px-8 py-4">{{ $offer->title }}</td>
                                <td class="px-8 py-4">{{ Str::limit($offer->description) }}</td>
                                <td class="px-8 py-4">{{ $offer->location }}</td>
                                @php
                                    $apply=DB::table('apply_for_jobs')->where('title',$offer->title)->count();
                                @endphp
                                <td class="px-8 py-4">
                                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                        <a href="{{ route('jobApplication'}}"> <span class="mr-2">{{ $apply }}</span>Candidates</a>
                                    </button>
                                </td>
                                <td class="px-8 py-4 flex">
                                    <div class="flex flex-col space-y-1">
                                        <a href="{{ route('offer.edit',$offer->slug) }}" class=" bg-green-600 hover:bg-green-700 inline-block px-2 py-1 cursor-pointer text-white rounded">
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                class="h-4 w-4"
                                                viewBox="0 0 20 20"
                                                fill="currentColor">
                                                    <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                                    <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
                                            </svg>
                                        </a>
                                        <form id ="{{ $offer->id }}"action="{{ route('offer.delete',$offer->slug) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            </form>
                                            <button
                                            onclick="event.preventDefault();
                                            if(confirm('Once you delete your offer, it cannot be restored. Are you absolutely sure that you want to proceed with this action?'))
                                            document.getElementById({{ $offer->id }}).submit();"
                                            type="submit" class="bg-red-500 hover:bg-red-700 inline-block px-2 py-1 cursor-pointer text-white rounded">
                                                <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                class="h-4 w-4"
                                                fill="none"
                                                viewBox="0 0 24 24"
                                                stroke="currentColor"
                                                stroke-width="2">
                                                    <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </button>

                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                  </table>
                  @endif
                <x-section-border />
            @endif
            @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                @livewire('profile.update-profile-information-form')

                <x-section-border />
            @endif

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                <div class="mt-10 sm:mt-0">
                    @livewire('profile.update-password-form')
                </div>

                <x-section-border />
            @endif

            @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
                <div class="mt-10 sm:mt-0">
                    @livewire('profile.two-factor-authentication-form')
                </div>

                <x-section-border />
            @endif

            <div class="mt-10 sm:mt-0">
                @livewire('profile.logout-other-browser-sessions-form')
            </div>

            @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
                <x-section-border />

                <div class="mt-10 sm:mt-0">
                    @livewire('profile.delete-user-form')
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
