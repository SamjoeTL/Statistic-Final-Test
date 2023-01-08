<x-template-layout>

<div class="flex flex-col w-[1250px] px-10 mt-5 bg-white shadow-xl rounded-xl">
   <div class="relative w-full overflow-x-auto">
    <h1 class="my-10 px-96 text-3xl text-center font-bold">Student Data</h1>
    <a href="{{ route('student.create') }}"><button class="focus:outline-none text-white bg-teal-700 hover:bg-gray-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-teal-600 dark:hover:bg-teal-700 dark:focus:ring-teal-800">Add Data</button></a>
    @if ($students->count() > 0)
    <a href="{{ route('exportPDF') }}"><button class="focus:outline-none text-white bg-teal-700 hover:bg-gray-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Export PDF</button></a>
    <a href="{{ route('exportExcel')}}"><button class="focus:outline-none text-white bg-teal-700 hover:bg-gray-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Export EXCEL</button></a>
    @else 
    <a href="{{ route('exportPDF') }}"><button class="focus:outline-none text-white bg-teal-700 hover:bg-gray-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800" disabled>Export PDF</button></a>
    <a href="{{ route('exportExcel')}}"><button class="focus:outline-none text-white bg-teal-700 hover:bg-gray-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800" disabled>Export EXCEL</button></a>
    @endif
        <style>
            dialog[open] {
                animation: appear .15s cubic-bezier(0, 1.8, 1, 1.8);
            }

            dialog::backdrop {
                background: linear-gradient(45deg, rgba(0, 0, 0, 0.5), rgba(54, 54, 54, 0.5));
                backdrop-filter: blur(3px);
            }

            @keyframes appear {
            from {
                opacity: 0;
                transform: translateX(-3rem);
                }

            to {
                opacity: 1;
                transform: translateX(0);
                }
            }
        </style>

            <section class="flex item">
            <button onclick="document.getElementById('myModal').showModal()" id="btn" class="absolute top-28 right-0 mt-1 focus:outline-none text-white bg-blue-700 hover:bg-gray-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Import Students Data</button>
            </section>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
                <dialog id="myModal" class="w-40 p-2 bg-white rounded-md h-72 md:w-fit ">
                    <div class="flex flex-col w-full h-auto">
                        <!-- Header -->
                            <div class="flex items-center justify-center w-full h-auto">
                            <div class="flex items-center justify-center w-10/12 h-auto py-3 text-2xl font-bold">
                            Import Students Data
                            </div>
                            <div onclick="document.getElementById('myModal').close();" class="flex justify-center w-1/12 h-auto cursor-pointer">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                            </div>
                        <!--Header End-->
                        </div>
                         <!-- Modal Content-->
                         <div class="card-body">
                             <form action="{{ route('importExcel') }}"
                                            method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <input type="file" name="file"
                                            class="mt-10 mx-72 form-control md-72" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
                                            <br>
                                            <button class=" mt-10 focus:outline-none mx-72 md-72 text-white bg-teal-700 hover:bg-gray-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-teal-600 dark:hover:bg-teal-700 dark:focus:ring-teal-800 btn btn-success">
                                            @lang('Import')
                                            Input
                                            </button>
                                    </form>
                                </div>
                             </div>
                         </div>
                <table class="w-full px-10 py-10 mt-3 text-sm text-left text-graborder-y-red-500 shadow-md">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-200">
                         <tr>
                        <th scope="col" class="px-2 py-5">
                        Number
                        </th>
                        <th scope="col" class="px-6 py-3">
                        Student NIM
                        </th>
                        <th scope="col" class="px-6 py-3">
                        Student Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                        Score
                        </th>
                        <th scope="col" class="px-6 py-3">
                        action
                        </th>
                        <th scope="col" class="px-6 py-3">
                        action
                        </th>
                    </tr>

            </thead>
        <tbody>
            @if ($students->count() > 0)
            @foreach ($students as $student)
            <tr class="bg-white border-b">
            <td class="px-6 py-4">
            {{ $loop->iteration }}
                </td>
                <td class="px-6 py-4">
                {{ $student->NIM }}
                </td>
                <td class="px-6 py-4">
                {{ $student->name }}
                </td>
                <td class="px-6 py-4">
                {{ $student->score }}
                </td>
                <td class="px-6 py-4"><a href="{{ route('student.edit', $student->id) }}"><button class="w-16 h-8 text-white bg-yellow-500 rounded-full">Edit</button></a></td>
                <td class="px-6 py-4">
                <form action="{{ route('student.destroy', $student->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="w-16 h-8 text-white bg-red-500 rounded-full" onclick="return confirm('Apakah Kamu Yakin Ingin Menghapus Data {{ $student->name }}')">Delete</button>
                </form>

              </th>
            </tr>
            @endforeach
            @else
            <tr>
            <td colspan="6" class="px-6 py-4 text-center">
            Data Kosong
            </td>
            </tr>
            @endif
        </tbody>
    </table>
    <div class="px-4 mt-6 mb-6">
      {{ $students->links() }}
    </div>
  </div>
</div>
</x-template-layout>
