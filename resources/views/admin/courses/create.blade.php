<x-app-layout>
    <div class="flex">
        <div class="w-[1200px] relative flex items-start mx-auto p-4 py-6 lg:py-8 gap-8">
            @include('layouts.sidebar')
            <!-- Main Content -->
            <div class="w-full lg:w-5/6">
                <div class="bg-white overflow-hidden p-4 sm:p-8 shadow-sm sm:rounded-lg">
                    <h2 class="font-semibold text-2xl text-gray-800 leading-tight mb-4">
                        {{ __('New Course') }}
                    </h2>

                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div class="py-3 px-4 mb-4 w-full rounded-lg bg-red-500 text-white">
                                {{ $error }}
                            </div>
                        @endforeach
                    @endif

                    <form method="POST" action="{{ route('admin.courses.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-4">
                            <x-input-label for="name" :value="__('Name')" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                                :value="old('name')" required autofocus />
                        </div>

                        <div class="mb-4">
                            <x-input-label for="path_trailer" :value="__('Trailer Path')" />
                            <x-text-input id="path_trailer" class="block mt-1 w-full" type="text" name="path_trailer"
                                :value="old('path_trailer')" required />
                        </div>

                        <div class="mb-4">
                            <x-input-label for="about" :value="'About'" />
                            <textarea id="about" name="about"
                                class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                rows="4" required></textarea>
                        </div>

                        <div class="mb-4">
                            <x-input-label for="desc" :value="'Desc'" />
                            <textarea id="desc" name="desc"
                                class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                rows="4" required></textarea>
                        </div>

                        <div class="mb-4">
                            <x-input-label for="thumbnail" :value="__('Thumbnail')" />
                            <x-text-input id="thumbnail" class="block mt-1 w-full" type="file" name="thumbnail"
                                required />
                        </div>

                        <div class="mb-4">
                            <x-input-label for="category_id" :value="__('Category')" />
                            <select id="category_id" name="category_id"
                                class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                required>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        @role('owner')
                            <div class="mb-4">
                                <x-input-label for="teacher_id" :value="__('Teacher')" />
                                <select id="teacher_id" name="teacher_id"
                                    class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                    required>
                                    @foreach ($teachers as $teacher)
                                        <option value="{{ $teacher->id }}">{{ $teacher->user->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        @endrole

                        <div class="flex items-center justify-end gap-4 mt-12">
                            <a href="{{ route('admin.courses.index') }}"
                                class="py-2 px-4 bg-white text-gray-700 rounded border border-gray-300 hover:bg-gray-50 transition duration-300 ease-in-out">Cancel</a>
                            <button type="submit"
                                class="py-2 px-4 bg-blue-500 text-white rounded hover:bg-blue-600 transition duration-300 ease-in-out">
                                Create
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
