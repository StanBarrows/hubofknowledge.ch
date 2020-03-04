<div class="bg-white">
    <div class="max-w-screen-xl mx-auto py-12 px-4 sm:px-6 lg:py-16 lg:px-8">
        <div class="xl:grid xl:grid-cols-3 xl:gap-8">
            <div class="xl:col-span-1">
                <a href="{{ route('start.index') }}"><img class="h-10" src="{{ asset('images/hok_logo.png') }}" alt="{{ config('app.name') }}" /></a>
                <p class="mt-8 text-gray-500 text-base leading-6">
                    A place where people exchange knowledge, experiences and ideas on how to improve services, and create connections with peers and experts in a secure environment
                </p>
                <div class="mt-8 flex">
                    <a target="_blank" href="{{ config('hok.github_repository_url') }}" class="ml-6 text-gray-400 hover:text-gray-500">
                        <span class="sr-only">GitHub</span>
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd"/>
                        </svg>
                    </a>
                </div>
            </div>
            <div class="mt-12 grid grid-cols-2 gap-8 xl:mt-0 xl:col-span-2">
                <div class="md:grid md:grid-cols-2 md:gap-8">
                    <div>
                        <h4 class="text-sm leading-5 font-semibold tracking-wider text-gray-400 uppercase">
                            {{ Auth::user()->name }}
                        </h4>
                        <ul class="mt-4">
                            <li>
                                <a href="{{ route('profile.index') }}" class="text-base leading-6 text-gray-500 hover:text-gray-900">
                                    {{ __('layouts.footer.profile') }}
                                </a>
                            </li>
                            <li class="mt-4">
                                <a target="_blank" href="mailto:{{ config('hok.support_email') }}" class="text-base leading-6 text-gray-500 hover:text-gray-900">
                                    {{ __('layouts.footer.support') }}
                                </a>
                            </li>
                            <li class="mt-4">
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="text-base leading-6 text-gray-500 hover:text-gray-900">
                                    {{ __('layouts.footer.sign_out') }}
                                </a>
                            </li>
                        </ul>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                            {{ csrf_field() }}
                        </form>


                    </div>
                    @hasanyrole('expert')
                    <div class="mt-12 md:mt-0">
                        <h4 class="text-sm leading-5 font-semibold tracking-wider text-gray-400 uppercase">
                            {{ __('layouts.footer.expert.title') }}
                        </h4>
                        <ul class="mt-4">
                            <li>
                                <a href="{{ route('associations.index') }}" class="text-base leading-6 text-gray-500 hover:text-gray-900">
                                    {{ __('layouts.footer.expert.associations') }}
                                </a>
                            </li>
                        </ul>
                    </div>
                    @endhasanyrole
                </div>

                @hasanyrole('administrator')
                <div class="md:grid md:grid-cols-2 md:gap-8">
                    <div>
                        <h4 class="text-sm leading-5 font-semibold tracking-wider text-gray-400 uppercase">
                            {{ __('layouts.footer.administrator.title') }}
                        </h4>
                        <ul class="mt-4">
                            <li>
                                <a href="{{ route('users.index') }}" class="text-base leading-6 text-gray-500 hover:text-gray-900">
                                    {{ __('layouts.footer.administrator.users') }}
                                </a>
                            </li>

                            <li class="mt-4">
                                <a href="{{ route('documentation.index') }}" class="text-base leading-6 text-gray-500 hover:text-gray-900">
                                    {{ __('layouts.footer.administrator.documentation') }}
                                </a>
                            </li>
                        </ul>
                    </div>
                    @endhasanyrole
                </div>
            </div>
        </div>
        <div class="mt-12 border-t border-gray-200 pt-8">
            <p class="text-base leading-6 text-gray-400 xl:text-center">
                &copy; 2020 <a target="_blank" href="mailto:{{ config('hok.support_email') }}" class="font-medium text-indigo-500">Sebastian Fix</a>. All rights reserved.
            </p>
        </div>
    </div>
</div>
