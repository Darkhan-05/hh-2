<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ $resume->id }}
        </h2>

    </header>



    <form method="post" action="{{ route('resume.store') }}" class="mt-6 space-y-6">
        @csrf

        <div>
            <x-input-label for="first_name" :value="__('First name')" />
            <input id="first_name" name="first_name" type="text" class="block w-full mt-1" value="{{ $resume->first_name }}" required autofocus />
        </div>
        <div>
            <x-input-label for="middle_name" :value="__('Middle name')" />
            <input id="middle_name" name="middle_name" type="text" class="block w-full mt-1" value="{{ $resume->middle_name }}" required  />
            <x-input-error class="mt-2" :messages="$errors->get('middle_name')" />
        </div>
        <div>
            <x-input-label for="last_name" :value="__('Last name')" />
            <input id="last_name" name="last_name" type="text" class="block w-full mt-1" value="{{ $resume->last_name }}" required  />
            <x-input-error class="mt-2" :messages="$errors->get('last_name')" />
        </div>



        <div class="mb-6">
            <x-input-label for="email" :value="__('Email')" />
            <input id="email" name="email"  type="email" class="block w-full mt-1" value="{{ $resume->email }}" required />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />
        </div>

        <div>
            <x-input-label for="age" :value="__('Age')" />
            <input id="age" name="age" type="number" class="block w-full mt-1" value="{{ $resume->age }}" required  />
            <x-input-error class="mt-2" :messages="$errors->get('age')" />
        </div>
        <div>
            <x-input-label for="phone" :value="__('Phone')" />
            <input id="phone" name="phone" type="text" class="block w-full mt-1" value="{{ $resume->phone }}" required  />
            <x-input-error class="mt-2" :messages="$errors->get('phone')" />
        </div>
        <div>
            <x-input-label for="address" :value="__('Address')" />
            <input id="address" name="address" type="text" class="block w-full mt-1" value="{{ $resume->address }}" required  />
            <x-input-error class="mt-2" :messages="$errors->get('address')" />
        </div>

        <div>
            <x-input-label for="gender_id" :value="__('Gender')" />
            <select name="gender_id" class="border-gray-300 rounded-md dark:bg-gray-800 dark:text-white dark:border-gray-600 focus:ring-indigo-500 focus:border-indigo-500">
                @foreach ($genders as $gender)
                    <option value="{{ $gender->id }}" selected="{{ $resume->gender_id }}" class="dark:bg-gray-800 dark:text-white">{{ $gender->name }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <x-input-label for="city_id" :value="__('City')" />
            <select name="city_id" class="border-gray-300 rounded-md dark:bg-gray-800 dark:text-white dark:border-gray-600 focus:ring-indigo-500 focus:border-indigo-500">
                @foreach ($cities as $city)
                    <option value="{{ $city->id }}" selected="{{ $resume->city_id }}" class="dark:bg-gray-800 dark:text-white">{{ $city->name }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <x-input-label for="skills" :value="__('skills')" />
            <input id="skills" name="skills" type="text" class="block w-full mt-1" value="{{ $resume->skills }}" required  />
            <x-input-error class="mt-2" :messages="$errors->get('skills')" />
        </div>


        <div class="border"></div>
    </form>
</section>
