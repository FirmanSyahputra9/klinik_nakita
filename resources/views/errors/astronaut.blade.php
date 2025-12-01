<style>
    @keyframes float {
        0% {
            transform: translateY(-10px) rotate(-2deg);
        }

        50% {
            transform: translateY(10px) rotate(2deg);
        }

        100% {
            transform: translateY(-10px) rotate(-2deg);
        }
    }

    @keyframes starFloat {
        0% {
            opacity: 0.4;
            transform: translateY(0px);
        }

        50% {
            opacity: 1;
            transform: translateY(-8px);
        }

        100% {
            opacity: 0.4;
            transform: translateY(0px);
        }
    }
</style>

<div class="animate-[float_4s_ease-in-out_infinite]">
    <svg class="w-72 h-72 mx-auto" viewBox="0 0 200 200" fill="none">

        {{-- Helmet --}}
        <circle cx="100" cy="90" r="25" fill="#E0E7FF" stroke="#6366F1" stroke-width="2" />
        <circle cx="100" cy="90" r="18" fill="#C7D2FE" opacity="0.5" />

        {{-- Face --}}
        <circle cx="94" cy="86" r="3" fill="#1F2937" />
        <circle cx="106" cy="86" r="3" fill="#1F2937" />
        <path d="M 96,95 Q 100,98 104,95" stroke="#1F2937" stroke-width="2" fill="none" />

        {{-- Body --}}
        <rect x="85" y="120" width="30" height="35" rx="5" fill="#6366F1" />
        <rect x="88" y="125" width="24" height="5" fill="#818CF8" />

        {{-- Arms --}}
        <rect x="70" y="120" width="8" height="30" rx="4" fill="#6366F1" transform="rotate(-20 75 135)" />
        <rect x="122" y="120" width="8" height="30" rx="4" fill="#6366F1" transform="rotate(20 126 135)" />

        {{-- Legs --}}
        <rect x="90" y="155" width="10" height="25" rx="5" fill="#4F46E5" />
        <rect x="105" y="155" width="10" height="25" rx="5" fill="#4F46E5" />

        {{-- Flag --}}
        <line x1="140" y1="110" x2="140" y2="70" stroke="#DC2626" stroke-width="2" />
        <path d="M 140,70 L 165,75 L 140,80 Z" fill="#EF4444" />
        <text x="145" y="78" font-size="10" fill="white">?</text>

        {{-- Stars --}}
        @for ($i = 0; $i
        < 8; $i++)
            <circle
            cx="{{ 40 + $i * 20 }}"
            cy="{{ 30 + sin($i) * 10 }}"
            r="3"
            class="animate-[starFloat_3s_ease-in-out_infinite]"
            fill="#FBBF24"
            opacity="0.7" />
        @endfor

        {{-- Planets --}}
        <circle cx="40" cy="160" r="15" fill="#EC4899" opacity="0.6" />
        <circle cx="170" cy="160" r="10" fill="#8B5CF6" opacity="0.6" />
        <circle cx="160" cy="50" r="18" fill="#3B82F6" opacity="0.4" />

    </svg>
</div>