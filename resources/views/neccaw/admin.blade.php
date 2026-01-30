<!DOCTYPE html>
<html>

<head>
    <title>NECCAW Confirmations</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen p-6">

    <div class="max-w-full mx-auto">

        <!-- ================= HEADER ================= -->
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold">
                NECCAW Steering Committee Submissions
            </h1>

            <span class="text-sm text-gray-500">
                Total: {{ $confirmations->total() }}
            </span>
        </div>

        <!-- ================= TABLE ================= -->
        <div class="bg-white rounded-xl shadow overflow-hidden">

            <table class="min-w-full text-sm">

                <thead class="bg-green-700 text-white">
                    <tr>
                        <th class="p-3 text-left">Name</th>
                        <th class="p-3 text-left">Email</th>
                        <th class="p-3 text-left">Organization</th>
                        <th class="p-3 text-left">Interest</th>
                        <th class="p-3 text-left">Submitted</th>
                        <th class="p-3 text-center">Action</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach ($confirmations as $c)
                        <tr class="border-b hover:bg-gray-50">

                            <!-- NAME -->
                            <td class="p-3 font-medium">{{ $c->name }}</td>

                            <!-- EMAIL -->
                            <td class="p-3">{{ $c->email }}</td>

                            <!-- ORG -->
                            <td class="p-3">{{ $c->organization }}</td>

                            <!-- INTEREST -->
                            <td class="p-3">
                                <span
                                    class="px-2 py-1 rounded text-white text-xs
            {{ $c->interest == 'yes' ? 'bg-green-600' : 'bg-red-600' }}">
                                    {{ strtoupper($c->interest) }}
                                </span>
                            </td>

                            <!-- DATE -->
                            <td class="p-3">
                                {{ $c->created_at->format('d M Y') }}
                            </td>

                            <!-- ACTION -->
                            <td class="p-3 text-center">

                                @if ($c->interest === 'yes')
                                    <button onclick='openModal(@json($c))'
                                        class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-1 rounded">
                                        View
                                    </button>
                                @else
                                    <span class="text-gray-400 italic text-sm">
                                        No Details
                                    </span>
                                @endif

                            </td>

                        </tr>
                    @endforeach

                </tbody>

            </table>

        </div>

        <!-- ================= PAGINATION ================= -->
        <div class="mt-4">
            {{ $confirmations->links() }}
        </div>

    </div>

    <!-- ================= MODAL ================= -->
    <div id="modal" class="fixed inset-0 bg-black/50 hidden items-center justify-center z-50">

        <div class="bg-white w-full max-w-xl rounded-xl p-6 relative h-[90vh] overflow-auto">

            <button onclick="closeModal()" class="absolute top-3 right-3 text-gray-500 hover:text-black">
                ✕
            </button>

            <h2 class="text-xl font-bold mb-4">
                Submission Details
            </h2>

            <div class="grid grid-cols-2 gap-4 text-sm">

                <div>
                    <p class="font-semibold">Name</p>
                    <p id="m_name"></p>
                </div>

                <div>
                    <p class="font-semibold">Email</p>
                    <p id="m_email"></p>
                </div>

                <div>
                    <p class="font-semibold">Organization</p>
                    <p id="m_org"></p>
                </div>

                <div>
                    <p class="font-semibold">Interest</p>
                    <p id="m_interest"></p>
                </div>

                <div class="col-span-2">
                    <p class="font-semibold">Experience</p>
                    <p id="m_experience"></p>
                </div>

                <div class="col-span-2">
                    <p class="font-semibold">Commitments</p>
                    <p id="m_commitments"></p>
                </div>

                <div class="col-span-2">
                    <p class="font-semibold">Bio</p>
                    <p id="m_bio"></p>
                </div>

                <div class="col-span-2">
                    <p class="font-semibold">Comments</p>
                    <p id="m_comments"></p>
                </div>

                <div class="col-span-2">
                    <p class="font-semibold">Photo</p>
                    <img id="m_photo" class="w-32 rounded mt-2">
                </div>

            </div>

        </div>
    </div>

    <!-- ================= SCRIPT ================= -->
    <script>
        function openModal(data) {

            document.getElementById("m_name").innerText = data.name;
            document.getElementById("m_email").innerText = data.email;
            document.getElementById("m_org").innerText = data.organization;
            document.getElementById("m_interest").innerText = data.interest.toUpperCase();
            document.getElementById("m_experience").innerText = data.experience || "-";
            document.getElementById("m_bio").innerText = data.bio || "-";
            document.getElementById("m_comments").innerText = data.comments || "-";

            // Commitments (json or string)
            if (data.commitments) {
                try {
                    let arr = JSON.parse(data.commitments);
                    document.getElementById("m_commitments").innerText = arr.join(", ");
                } catch {
                    document.getElementById("m_commitments").innerText = data.commitments;
                }
            } else {
                document.getElementById("m_commitments").innerText = "-";
            }

            // Photo
            if (data.photo) {
                document.getElementById("m_photo").src = "/storage/" + data.photo;
            }

            document.getElementById("modal").classList.remove("hidden");
            document.getElementById("modal").classList.add("flex");
        }

        function closeModal() {
            document.getElementById("modal").classList.add("hidden");
        }
    </script>

</body>

</html>
