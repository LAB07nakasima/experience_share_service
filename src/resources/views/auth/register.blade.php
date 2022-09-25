<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('名前')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('メールアドレス')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Age -->
            <div class="mt-4">
                <x-label for="age" :value="__('年齢')" />

                <x-input id="age" class="block mt-1 w-full"
                                type="number"
                                name="age"
                                :value="old('email')" required/>
            </div>

            <!--  Gender -->
            <div class="mt-4">
                <x-label for="age" :value="__('性別')" />
                {{-- <span class="text-gray-700"></span> --}}
                <div class="mt-2">
                  <label class="inline-flex items-center">
                    <input type="radio" class="form-radio" name="gender" value=男性>
                    <span class="ml-2">男性</span>
                  </label>
                  <label class="inline-flex items-center ml-6">
                    <input type="radio" class="form-radio" name="gender" value=女性>
                    <span class="ml-2">女性</span>
                  </label>
                </div>
              </div>

            <!-- Address -->
            <div>
                <x-label for="address" :value="__('住所')" />

                <x-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('パスワード')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="text"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                    <x-input id="password_confirmation" class="block mt-1 w-full"
                        type="password"
                        name="password_confirmation" required />
            </div>



            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
