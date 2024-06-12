@php( $subscribers = \App\Models\subscribers::orderBy('id', 'desc')->get())
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="container mx-auto mt-8">
                <h1 class="text-2xl font-semibold text-white mb-4">Subscribers List</h1>

                <div class="flex justify-end mt-4">
                    <button onclick="exportEmails()" class="bg-gray-900 hover:bg-gray-800 text-white font-bold py-2 mb-4 px-4 rounded">
                        Export Emails
                    </button>
                </div>

                <!-- Table -->
                <table class="min-w-full bg-white border border-gray-300 rounded-md overflow-hidden mb-16">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="py-2 px-4 border-b">ID</th>
                            <th class="py-2 px-4 border-b">Name</th>
                            <th class="py-2 px-4 border-b">Email</th>
                            <th class="py-2 px-4 border-b">Action</th>
                            <!-- Add more columns as needed -->
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($subscribers as $subscriber)
                        
                            <tr>
                                <td class="py-2 px-4 border-b">{{ $subscriber->id }}</td>
                                <td class="py-2 px-4 border-b">{{ $subscriber->name }}</td>
                                <td class="py-2 px-4 border-b">{{ $subscriber->email }}</td>
                                <td>
                                <a x-data="" x-on:click.prevent="$dispatch('open-modal', 'details{{ $subscriber->id }}')"
                                    class="text-sm DINAlternateBold">Details</a>
                                </td>
                                <!-- Add more columns as needed -->
                            </tr>

                            <x-modal name="details{{ $subscriber->id }}" focusable>
                                <!-- Modal Content -->
                                <div class="px-6 py-6">
                                <p><strong>Service</strong> <br> {{ $subscriber->service }}</p>
                                <p><strong>Inquiry</strong> <br> {{ $subscriber->Inquiry }}</p>
                                </div>

                            </x-modal>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
    function exportEmails() {
        // Get all email addresses
        var emails = @json($subscribers->pluck('email'));

        // Convert the array to a CSV string
        var csvContent = emails.join("\n");

        // Create a Blob
        var blob = new Blob([csvContent], { type: "text/csv;charset=utf-8" });

        // Create a link element
        var link = document.createElement("a");

        // Set the link's href to the Blob URL
        link.href = URL.createObjectURL(blob);

        // Set the link's download attribute with the desired filename
        link.setAttribute("download", "email_list.csv");

        // Append the link to the document
        document.body.appendChild(link);

        // Trigger the download
        link.click();

        // Clean up
        document.body.removeChild(link);
    }
</script>
</x-app-layout>
