<div class="flex flex-col">
    <div class="flex flex-row">
        <div class="py-2"><p>Nama Siswa:</p></div>
        <div class="rounded bg-slate-300 ml-2 basis-1/3 py-2"><p class="capitalize ml-3">{{ $user->nama }}</div>
    </div>
    <div class="flex flex-row">
        <div class="py-2"><p>Kelas:</p></div>
        <div class="rounded bg-slate-300 ml-2 basis-1/3 py-2"><p class="capitalize ml-3">{{ $user->kelas->nama }}</div>
    </div> 
</div>