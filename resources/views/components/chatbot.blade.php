{{-- Floating AI Chatbot Widget --}}
<div class="fixed bottom-8 right-8 z-50" id="chatbot-widget">

    {{-- Chat Button --}}
    <button id="chatbot-toggle"
            class="flex items-center gap-3 shadow-2xl transition-all duration-300 group"
            style="background:rgba(40,42,43,0.95); border:1px solid rgba(69,70,77,0.3); color:#e1e3e4; padding:16px; border-radius:9999px;"
            onmouseover="this.style.borderColor='rgba(233,195,73,0.5)'; this.style.color='#e9c349';"
            onmouseout="this.style.borderColor='rgba(69,70,77,0.3)'; this.style.color='#e1e3e4';">
        <div class="p-2 rounded-full flex items-center justify-center" style="background:#e9c349; color:#0b132b;">
            <span class="material-symbols-outlined" style="font-variation-settings:'FILL' 1;">temp_preferences_custom</span>
        </div>
        <span class="hidden md:block text-sm font-semibold" style="font-size:12px; letter-spacing:0.1em; text-transform:uppercase; margin-right:8px;" id="chatbot-label">Ask AI Assistant</span>
    </button>

    {{-- Chat Panel --}}
    <div id="chatbot-panel"
         class="hidden absolute bottom-20 right-0 w-80 md:w-96 shadow-2xl flex flex-col overflow-hidden"
         style="background:rgba(28,37,65,0.97); border:1px solid rgba(233,195,73,0.25); border-radius:4px; max-height:480px;">

        {{-- Panel Header --}}
        <div class="flex items-center justify-between px-6 py-4" style="border-bottom:1px solid rgba(233,195,73,0.15); background:rgba(11,19,43,0.9);">
            <div class="flex items-center gap-3">
                <span class="material-symbols-outlined" style="color:#e9c349; font-variation-settings:'FILL' 1;">temp_preferences_custom</span>
                <div>
                    <p class="font-semibold" style="color:#e9c349; font-size:14px;">D'Mahesa AI Assistant</p>
                    <p style="color:#c6c6ce; font-size:11px; letter-spacing:0.05em;">Powered by Google Gemini</p>
                </div>
            </div>
            <button id="chatbot-close" style="color:#c6c6ce; cursor:pointer;"
                    onmouseover="this.style.color='#e9c349'" onmouseout="this.style.color='#c6c6ce'">
                <span class="material-symbols-outlined">close</span>
            </button>
        </div>

        {{-- Messages --}}
        <div id="chatbot-messages" class="flex-1 overflow-y-auto p-4 flex flex-col gap-3" style="min-height:200px; max-height:300px;">
            {{-- Welcome message --}}
            <div class="flex gap-3">
                <div class="w-8 h-8 rounded-full flex items-center justify-center flex-shrink-0" style="background:#e9c349; color:#0b132b;">
                    <span class="material-symbols-outlined" style="font-size:16px; font-variation-settings:'FILL' 1;">temp_preferences_custom</span>
                </div>
                <div class="rounded-lg px-4 py-3 text-sm" style="background:rgba(11,19,43,0.8); color:#e1e3e4; border:1px solid rgba(233,195,73,0.1); max-width:85%;">
                    Selamat datang di D'Mahesa Law Firm! Saya adalah asisten AI Anda. Ada yang bisa saya bantu terkait layanan hukum kami?
                </div>
            </div>
        </div>

        {{-- Input Area --}}
        <div class="p-4" style="border-top:1px solid rgba(69,70,77,0.3);">
            <div class="flex gap-2">
                <input type="text" id="chatbot-input"
                       placeholder="Ketik pertanyaan Anda..."
                       class="flex-1 rounded px-4 py-2 text-sm outline-none transition-colors"
                       style="background:rgba(11,19,43,0.8); border:1px solid rgba(69,70,77,0.5); color:#e1e3e4; font-family:'Inter',sans-serif;"
                       onfocus="this.style.borderColor='rgba(233,195,73,0.5)'"
                       onblur="this.style.borderColor='rgba(69,70,77,0.5)'">
                <button id="chatbot-send"
                        class="flex items-center justify-center rounded transition-colors"
                        style="background:#e9c349; color:#0b132b; padding:8px 12px; flex-shrink:0;"
                        onmouseover="this.style.background='#ffe088'" onmouseout="this.style.background='#e9c349'">
                    <span class="material-symbols-outlined" style="font-size:18px;">send</span>
                </button>
            </div>
        </div>
    </div>
</div>

<script>
(function() {
    const toggle   = document.getElementById('chatbot-toggle');
    const panel    = document.getElementById('chatbot-panel');
    const closeBtn = document.getElementById('chatbot-close');
    const input    = document.getElementById('chatbot-input');
    const sendBtn  = document.getElementById('chatbot-send');
    const messages = document.getElementById('chatbot-messages');

    // ── Gemini called directly from browser (avoids server timeout) ──
    const GEMINI_API_KEY = '{{ config("services.gemini.api_key") }}';
    const SYSTEM_PROMPT  = "Kamu adalah asisten hukum virtual dari D'Mahesa Law Firm, kantor hukum terkemuka di Indonesia. Jawab pertanyaan dengan profesional, ramah, dan dalam bahasa Indonesia. Berikan jawaban yang ringkas dan padat. Jika pertanyaan di luar bidang hukum, arahkan pengguna untuk berkonsultasi langsung dengan advokat kami.";

    function togglePanel() {
        panel.classList.toggle('hidden');
        if (!panel.classList.contains('hidden')) { input.focus(); }
    }

    toggle.addEventListener('click', togglePanel);
    closeBtn.addEventListener('click', togglePanel);

    function escapeHtml(text) {
        const d = document.createElement('div');
        d.appendChild(document.createTextNode(text));
        return d.innerHTML;
    }

    function parseMarkdown(text) {
        let html = escapeHtml(text);
        html = html.replace(/\*\*(.*?)\*\*/g, '<strong>$1</strong>');
        html = html.replace(/\*(.*?)\*/g, '<em>$1</em>');
        html = html.replace(/\n/g, '<br>');
        return html;
    }

    function appendMessage(text, isUser) {
        const div = document.createElement('div');
        div.className = 'flex gap-3 ' + (isUser ? 'flex-row-reverse' : '');
        div.innerHTML = isUser
            ? `<div class="rounded-lg px-4 py-3 text-sm" style="background:rgba(233,195,73,0.15); color:#e1e3e4; border:1px solid rgba(233,195,73,0.2); max-width:85%;">${text}</div>`
            : `<div class="w-8 h-8 rounded-full flex items-center justify-center flex-shrink-0" style="background:#e9c349; color:#0b132b;"><span class="material-symbols-outlined" style="font-size:16px; font-variation-settings:'FILL' 1;">temp_preferences_custom</span></div>
               <div class="rounded-lg px-4 py-3 text-sm" style="background:rgba(11,19,43,0.8); color:#e1e3e4; border:1px solid rgba(233,195,73,0.1); max-width:85%;">${text}</div>`;
        messages.appendChild(div);
        messages.scrollTop = messages.scrollHeight;
    }

    function appendTyping(label) {
        const div = document.createElement('div');
        div.id = 'typing-indicator';
        div.className = 'flex gap-3';
        div.innerHTML = `<div class="w-8 h-8 rounded-full flex items-center justify-center flex-shrink-0" style="background:#e9c349; color:#0b132b;"><span class="material-symbols-outlined" style="font-size:16px; font-variation-settings:'FILL' 1;">temp_preferences_custom</span></div>
                         <div class="rounded-lg px-4 py-3 text-sm" style="background:rgba(11,19,43,0.8); color:#c6c6ce; border:1px solid rgba(233,195,73,0.1);">${label || 'Sedang mengetik...'}</div>`;
        messages.appendChild(div);
        messages.scrollTop = messages.scrollHeight;
    }

    function removeTyping() {
        const t = document.getElementById('typing-indicator');
        if (t) { t.remove(); }
    }

    function updateTypingLabel(label) {
        const t = document.getElementById('typing-indicator');
        if (t) { t.querySelector('div:last-child').textContent = label; }
    }

    function sleep(ms) {
        return new Promise(resolve => setTimeout(resolve, ms));
    }

    async function callGemini(prompt, attempt) {
        const url = `https://generativelanguage.googleapis.com/v1beta/models/gemini-flash-latest:generateContent?key=${GEMINI_API_KEY}`;

        const res  = await fetch(url, {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({
                system_instruction: { parts: [{ text: SYSTEM_PROMPT }] },
                contents: [{ parts: [{ text: prompt }] }],
                generationConfig: { temperature: 0.7, maxOutputTokens: 4096 }
            })
        });

        const data = await res.json();

        if (data.error) {
            const msg  = (data.error.message || '').toLowerCase();
            const busy = data.error.code === 503 || data.error.code === 429 ||
                         msg.includes('demand') || msg.includes('overload') || msg.includes('quota');

            // Retry up to 3 times with backoff if server is busy
            if (busy && attempt < 3) {
                const wait = [2000, 4000, 8000][attempt];
                updateTypingLabel(`Server sibuk, mencoba ulang (${attempt + 1}/3)...`);
                await sleep(wait);
                return callGemini(prompt, attempt + 1);
            }

            throw new Error(data.error.message);
        }

        if (data.candidates && data.candidates[0] && data.candidates[0].content) {
            return data.candidates[0].content.parts[0].text;
        }

        throw new Error('Respons tidak valid dari AI.');
    }

    async function sendMessage() {
        const text = input.value.trim();
        if (!text) { return; }

        input.value = '';
        appendMessage(parseMarkdown(text), true);
        appendTyping('Sedang mengetik...');
        sendBtn.disabled = true;

        try {
            const reply = await callGemini(text, 0);
            removeTyping();
            appendMessage(parseMarkdown(reply), false);
        } catch (e) {
            removeTyping();
            appendMessage('Layanan AI sedang sangat sibuk. Silakan coba beberapa saat lagi.', false);
        } finally {
            sendBtn.disabled = false;
            input.focus();
        }
    }

    sendBtn.addEventListener('click', sendMessage);
    input.addEventListener('keypress', function(e) {
        if (e.key === 'Enter') { sendMessage(); }
    });
})();
</script>
