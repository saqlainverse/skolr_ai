@extends('frontend.layouts.master')
@section('title', __('AI Teacher'))

@push('css')
<style>
    /* Custom styles for AI Teacher */
    .ai-teacher-section {
        background: #fff;
        border-radius: 12px;
        padding: 30px;
        margin-bottom: 20px;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
    }

    .ai-controls {
        display: none;
    }

    .ai-controls.active {
        display: block;
    }

    .ai-setup-screen {
        max-width: 500px;
        margin: 40px auto;
        text-align: center;
        padding: 40px 20px;
    }

    .ai-teacher-icon {
        width: 80px;
        height: 80px;
        margin: 0 auto 20px;
    }

    .ai-teacher-icon svg {
        width: 100%;
        height: 100%;
    }

    .ai-setup-title {
        font-size: 24px;
        font-weight: 600;
        color: #1a202c;
        margin-bottom: 30px;
    }

    .ai-select-wrapper {
        margin-bottom: 35px;
    }

    .ai-select-label {
        display: block;
        text-align: left;
        margin-bottom: 8px;
        font-size: 14px;
        color: #4a5568;
    }

    .ai-select {
    width: 100%;
    padding: 18px 15px;
    border: 1px solid #e2e8f0;
    border-radius: 8px;
    font-size: 15px;
    color: #1a202c;
    background-color: #fff;
    cursor: pointer;
    transition: all 0.3s ease;
    margin-bottom: 10px;
    }

    .ai-select:focus {
        outline: none;
        border-color: #3B82F6;
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
    }

    .ai-start-btn {
        width: 100%;
        padding: 12px 20px;
        background: #000;
        color: #fff;
        border: none;
        border-radius: 8px;
        font-size: 16px;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .ai-start-btn:hover {
        background: #1a1a1a;
    }

    .ai-chat-container {
        margin-top: 20px;
    }

    .ai-video-section {
        position: relative;
        width: 100%;
    }

    .ai-chat-section {
        width: 100%;
        max-width: 600px;
        margin: 20px auto 0;
    }

    .ai-chat-tabs {
        display: flex;
        margin-bottom: 15px;
        border-radius: 8px;
        overflow: hidden;
        background: #f8fafc;
    }

    .ai-chat-tab {
        flex: 1;
        padding: 15px;
        text-align: center;
        background: transparent;
        border: none;
        cursor: pointer;
        font-size: 16px;
        font-weight: 500;
        color: #64748b;
        transition: all 0.3s ease;
    }

    .ai-chat-tab.active {
        background: #000;
        color: #fff;
    }

    .ai-chat-content {
        display: none;
    }

    .ai-chat-content.active {
        display: block;
    }

    .ai-input-wrapper {
        position: relative;
        margin-bottom: 10px;
    }

    .ai-input {
        width: 100%;
        padding: 20px;
        border: 1px solid #e2e8f0;
        border-radius: 12px;
        font-size: 15px;
        transition: all 0.3s ease;
    }

    .ai-input:focus {
        outline: none;
        border-color: #3B82F6;
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
    }

    .ai-send-btn {
        width: 100%;
        padding: 10px;
        background: #000;
        color: #fff;
        border: none;
        border-radius: 12px;
        font-size: 16px;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .ai-send-btn:hover {
        background: #1a1a1a;
    }

    .ai-voice-btn {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        background: #000;
        color: #fff;
        border: none;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 20px auto;
        transition: all 0.3s ease;
    }

    .ai-voice-btn:hover {
        transform: scale(1.05);
    }

    .ai-voice-status {
        text-align: center;
        color: #64748b;
        font-size: 14px;
        margin-top: 10px;
    }

    .ai-disconnect-btn {
        position: absolute;
        top: 15px;
        right: 15px;
        padding: 8px 15px;
        background: rgba(239, 68, 68, 0.9);
        color: #fff;
        border: none;
        border-radius: 6px;
        font-size: 14px;
        cursor: pointer;
        transition: all 0.3s ease;
        z-index: 10;
    }

    .ai-disconnect-btn:hover {
        background: rgba(220, 38, 38, 1);
    }

    .ai-video {
        width: 100%;
        aspect-ratio: 16/9;
        background: #000;
        border-radius: 12px;
        margin-bottom: 20px;
        display: block;
    }

    .ai-status-log {
        padding: 15px;
        background: #f8fafc;
        border: 1px solid #e2e8f0;
        border-radius: 8px;
        font-family: monospace;
        font-size: 13px;
        line-height: 1.5;
        height: 100px;
        overflow-y: auto;
        margin-top: 20px;
    }

    #voiceChat .ai-status-log {
        margin-top: 20px;
        background: #fff;
        border: 1px solid #e2e8f0;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
    }

    /* Loader Styles */
    .ai-loader-container {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(255, 255, 255, 0.9);
        display: none;
        justify-content: center;
        align-items: center;
        z-index: 1000;
    }

    .ai-loader-container.active {
        display: flex;
    }

    .ai-loader {
        width: 50px;
        height: 50px;
        border: 5px solid #f3f3f3;
        border-top: 5px solid #000;
        border-radius: 50%;
        animation: spin 1s linear infinite;
    }

    .ai-loader-text {
        position: absolute;
        margin-top: 80px;
        font-size: 16px;
        color: #000;
        font-weight: 500;
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
</style>
@endpush

@section('content')
    <!--====== Start Profile Dashboard Section ======-->
    <section class="profile-dashboard-section p-t-50 p-b-80 p-b-md-50 p-t-sm-30">
        <!-- Loader -->
        <div class="ai-loader-container" id="aiLoader">
            <div class="ai-loader"></div>
            <div class="ai-loader-text">Initializing AI Teacher...</div>
        </div>

        <div class="container container-1278">
            <div class="row">
                @include('frontend.profile.sidebar')
                <div class="col-md-8">
                    <div class="dashboard-wrapper">
                        <div class="row">
                            <div class="col-12">
                                <div class="section-title-v3 color-dark m-b-40 m-b-sm-15">
                                    <h3>{{ __('AI Teacher') }}</h3>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="ai-teacher-section">
                                    <!-- Initial Setup Screen -->
                                    <div class="ai-setup-screen" id="setupScreen">
                                        <!-- <div class="ai-teacher-icon">
                                            <svg viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M32 6C28.2 6 25 9.2 25 13C25 16.8 28.2 20 32 20C35.8 20 39 16.8 39 13C39 9.2 35.8 6 32 6ZM32 17C29.8 17 28 15.2 28 13C28 10.8 29.8 9 32 9C34.2 9 36 10.8 36 13C36 15.2 34.2 17 32 17Z" fill="#333333"/>
                                                <path d="M45 21H19C17.3 21 16 22.3 16 24V37C16 38.7 17.3 40 19 40H21V55C21 56.7 22.3 58 24 58H40C41.7 58 43 56.7 43 55V40H45C46.7 40 48 38.7 48 37V24C48 22.3 46.7 21 45 21ZM40 55H24V37H40V55ZM45 37H43H21H19V24H45V37Z" fill="#333333"/>
                                                <path d="M32 43C30.3 43 29 44.3 29 46V49C29 50.7 30.3 52 32 52C33.7 52 35 50.7 35 49V46C35 44.3 33.7 43 32 43ZM32 49C31.4 49 31 48.6 31 48V47C31 46.4 31.4 46 32 46C32.6 46 33 46.4 33 47V48C33 48.6 32.6 49 32 49Z" fill="#333333"/>
                                                <path d="M27 28H25V31H27V28Z" fill="#333333"/>
                                                <path d="M39 28H37V31H39V28Z" fill="#333333"/>
                                            </svg>
                                        </div> -->
                                        <h2 class="ai-setup-title">Choose an Avatar</h2>
                                        <div class="ai-select-wrapper">
                                            <label class="ai-select-label">Select Avatar</label>
                                            <select class="ai-select" id="avatarSelect">
                                                <option value="Elenora_IT_Sitting_public">Elenora (IT Specialist)</option>
                                                <option value="Silas_CustomerSupport_public">Silas (Customer Support)</option>
                                                <option value="Jake-insuit-20220721">Jake</option>
                                                <option value="lily_metaverse_20220707">Lily</option>
                                                <option value="mona_metaverse_20220710">Mona</option>
                                                <option value="ryan_metaverse_20220915">Ryan</option>
                                                <option value="alice_lifestyle_20220818">Alice</option>
                                                <option value="alex-insuit-20220721">Alex</option>
                                                <option value="female_professor_20220719">Professor</option>
                                            </select>
                                        </div>
                                        <input type="hidden" id="avatarID" />
                                        <input type="hidden" id="voiceID" />
                                        <button class="ai-start-btn" id="startBtn">Start AI Teacher</button>
                                    </div>

                                    <!-- AI Controls (Hidden initially) -->
                                    <div class="ai-controls" id="aiControls">
                                        <div class="ai-chat-container">
                                            <div class="ai-video-section">
                                                <video id="mediaElement" class="ai-video" autoplay></video>
                                                <button class="ai-disconnect-btn" id="closeBtn">Disconnect</button>
                                            </div>
                                            
                                            <div class="ai-chat-section">
                                                <div class="ai-chat-tabs">
                                                    <button class="ai-chat-tab active" data-tab="text">Text Chat</button>
                                                    <button class="ai-chat-tab" data-tab="voice">Voice Chat</button>
                                                </div>

                                                <!-- Text Chat Section -->
                                                <div class="ai-chat-content active" id="textChat">
                                                    <div class="ai-input-wrapper">
                                                        <input
                                                            id="taskInput"
                                                            type="text"
                                                            placeholder="Type your message..."
                                                            class="ai-input"
                                                        />
                                                    </div>
                                                    <button id="talkBtn" class="ai-send-btn">Send</button>
                                                </div>
                                
                                <!-- Voice Chat Section -->
                                <div class="ai-chat-content" id="voiceChat">
                                    <button id="toggleSpeechBtn" class="ai-voice-btn">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M12 1a3 3 0 0 0-3 3v8a3 3 0 0 0 6 0V4a3 3 0 0 0-3-3z"></path>
                                            <path d="M19 10v2a7 7 0 0 1-14 0v-2"></path>
                                            <line x1="12" y1="19" x2="12" y2="23"></line>
                                            <line x1="8" y1="23" x2="16" y2="23"></line>
                                        </svg>
                                    </button>
                                    <div id="speechStatus" class="ai-voice-status">
                                        Click microphone to start speaking
                                    </div>
                                    <div id="recognizedText" class="ai-status-log"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--====== End Profile Dashboard Section ======-->

@push('js')
<!-- LiveKit Client -->
<script src="https://unpkg.com/livekit-client@1.15.5/dist/livekit-client.umd.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Configuration
        const API_CONFIG = {
            apiKey: "{{ config('services.heygen.api_key') }}",
            serverUrl: "https://api.heygen.com",
        };

        // Global variables
        let sessionInfo = null;
        let room = null;
        let mediaStream = null;
        let webSocket = null;
        let sessionToken = null;
        let eventIdCounter = 0;

        // DOM Elements
        const statusElement = document.getElementById("status");
        const mediaElement = document.getElementById("mediaElement");
        const avatarID = document.getElementById("avatarID");
        const voiceID = document.getElementById("voiceID");
        const taskInput = document.getElementById("taskInput");

        // Get DOM elements
        const setupScreen = document.getElementById('setupScreen');
        const aiControls = document.getElementById('aiControls');
        const avatarSelect = document.getElementById('avatarSelect');
        const chatTabs = document.querySelectorAll('.ai-chat-tab');
        const textChat = document.getElementById('textChat');
        const voiceChat = document.getElementById('voiceChat');

        // Set initial avatar ID
        avatarID.value = avatarSelect.value;

        // Update avatar ID when selection changes
        avatarSelect.addEventListener('change', function() {
            avatarID.value = this.value;
        });

        // Helper function to update status
        function updateStatus(message) {
            console.log(`[${new Date().toLocaleTimeString()}] ${message}`); // Always log to console
            const statusElement = document.getElementById("recognizedTexts");
            if (statusElement) {
                const timestamp = new Date().toLocaleTimeString();
                statusElement.innerHTML += `[${timestamp}] ${message}<br>`;
                statusElement.scrollTop = statusElement.scrollHeight;
            }
        }

        // Generate unique event ID
        function generateEventId() {
            return `event_${Date.now()}_${eventIdCounter++}`;
        }

        // Get session token
        async function getSessionToken() {
            try {
                const response = await fetch(
                    `${API_CONFIG.serverUrl}/v1/streaming.create_token`,
                    {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "X-Api-Key": API_CONFIG.apiKey,
                        },
                    }
                );

                if (!response.ok) {
                    const errorText = await response.text();
                    throw new Error(`Failed to get session token: ${response.status} - ${errorText}`);
                }

                const data = await response.json();
                sessionToken = data.data.token;
                updateStatus("Session token obtained");
            } catch (error) {
                updateStatus(`Error: ${error.message}`);
                console.error(error);
                throw error;
            }
        }

        // Create new session
        async function createNewSession() {
            try {
                if (!sessionToken) {
                    await getSessionToken();
                }

                if (!avatarID.value) {
                    throw new Error('No avatar selected');
                }

                const response = await fetch(
                    `${API_CONFIG.serverUrl}/v1/streaming.new`,
                    {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "Authorization": `Bearer ${sessionToken}`,
                        },
                        body: JSON.stringify({
                            quality: "high",
                            avatar_name: avatarID.value,
                            voice: {
                                voice_id: "",  // Default voice if not specified
                                rate: 1.0,
                            },
                            version: "v2",
                            video_encoding: "H264",
                        }),
                    }
                );

                if (!response.ok) {
                    const errorText = await response.text();
                    throw new Error(`Failed to create session: ${response.status} - ${errorText}`);
                }

                const data = await response.json();
                if (!data.data) {
                    throw new Error('Invalid response from server');
                }

                sessionInfo = data.data;
                updateStatus("Session info received");

                // Create LiveKit Room
                const { Room } = LivekitClient;
                if (!Room) {
                    throw new Error('LiveKit client not loaded');
                }

                room = new Room({
                    adaptiveStream: true,
                    dynacast: true,
                    videoCaptureDefaults: {
                        resolution: LivekitClient.VideoPresets.h720.resolution,
                    },
                });

                // Handle room events
                room.on(LivekitClient.RoomEvent.DataReceived, (message) => {
                    const data = new TextDecoder().decode(message);
                    console.log("Room message:", JSON.parse(data));
                });

                // Handle media streams
                mediaStream = new MediaStream();
                room.on(LivekitClient.RoomEvent.TrackSubscribed, (track) => {
                    if (track.kind === "video" || track.kind === "audio") {
                        mediaStream.addTrack(track.mediaStreamTrack);
                        if (
                            mediaStream.getVideoTracks().length > 0 &&
                            mediaStream.getAudioTracks().length > 0
                        ) {
                            mediaElement.srcObject = mediaStream;
                            updateStatus("Media stream ready");
                        }
                    }
                });

                // Handle media stream removal
                room.on(LivekitClient.RoomEvent.TrackUnsubscribed, (track) => {
                    const mediaTrack = track.mediaStreamTrack;
                    if (mediaTrack) {
                        mediaStream.removeTrack(mediaTrack);
                    }
                });

                // Handle room connection state changes
                room.on(LivekitClient.RoomEvent.Disconnected, (reason) => {
                    updateStatus(`Room disconnected: ${reason}`);
                });

                if (!sessionInfo.url || !sessionInfo.access_token) {
                    throw new Error('Missing session URL or access token');
                }

                await room.prepareConnection(sessionInfo.url, sessionInfo.access_token);
                updateStatus("Connection prepared");

                updateStatus("Session created successfully");
            } catch (error) {
                updateStatus(`Error: ${error.message}`);
                console.error(error);
                throw error;
            }
        }

        // Start streaming session
        async function startStreamingSession() {
            try {
                const startResponse = await fetch(
                    `${API_CONFIG.serverUrl}/v1/streaming.start`,
                    {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "Authorization": `Bearer ${sessionToken}`,
                        },
                        body: JSON.stringify({
                            session_id: sessionInfo.session_id,
                        }),
                    }
                );

                if (!startResponse.ok) {
                    const errorText = await startResponse.text();
                    throw new Error(`Failed to start streaming: ${startResponse.status} - ${errorText}`);
                }

                // Connect to LiveKit room
                await room.connect(sessionInfo.url, sessionInfo.access_token);
                updateStatus("Connected to room");

                document.querySelector("#startBtn").disabled = true;
                updateStatus("Streaming started successfully");
            } catch (error) {
                updateStatus(`Error: ${error.message}`);
                console.error(error);
                throw error;
            }
        }

        // Send text to avatar
        async function sendText(text, taskType = "talk") {
            try {
                if (!sessionInfo) {
                    updateStatus("No active session");
                    return;
                }

                const response = await fetch(
                    `${API_CONFIG.serverUrl}/v1/streaming.task`,
                    {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "Authorization": `Bearer ${sessionToken}`,
                        },
                        body: JSON.stringify({
                            session_id: sessionInfo.session_id,
                            text: text,
                            task_type: taskType,
                        }),
                    }
                );

                if (!response.ok) {
                    const errorText = await response.text();
                    throw new Error(`Failed to send text: ${response.status} - ${errorText}`);
                }

                updateStatus(`Sent text (${taskType}): ${text}`);
            } catch (error) {
                updateStatus(`Error: ${error.message}`);
                console.error(error);
            }
        }

        // Speech Recognition Setup
        let recognition = null;
        let isListening = false;
        let silenceTimer = null;
        const SILENCE_DURATION = 2000; // 2 seconds of silence before stopping

        if ('webkitSpeechRecognition' in window) {
            recognition = new webkitSpeechRecognition();
            recognition.continuous = true;
            recognition.interimResults = true;
            recognition.lang = 'en-US';

            recognition.onstart = () => {
                const toggleBtn = document.getElementById('toggleSpeechBtn');
                toggleBtn.style.backgroundColor = '#22c55e'; // Green color when active
                document.getElementById('speechStatus').textContent = 'Listening...';
                isListening = true;
            };

            recognition.onend = () => {
                if (isListening) {
                    // Auto-restart if still in listening mode
                    setTimeout(() => {
                        if (isListening) {
                            recognition.start();
                        }
                    }, 100);
                } else {
                    const toggleBtn = document.getElementById('toggleSpeechBtn');
                    toggleBtn.style.backgroundColor = '#000'; // Black color when inactive
                    document.getElementById('speechStatus').textContent = 'Click microphone to start speaking';
                }
            };

            recognition.onresult = (event) => {
                let finalTranscript = '';
                let interimTranscript = '';

                // Reset silence timer on speech detection
                if (silenceTimer) clearTimeout(silenceTimer);
                
                for (let i = event.resultIndex; i < event.results.length; i++) {
                    const transcript = event.results[i][0].transcript;
                    if (event.results[i].isFinal) {
                        finalTranscript += transcript;
                        // Send final transcript to avatar
                        if (finalTranscript.trim()) {
                            document.getElementById('taskInput').value = finalTranscript;
                            sendText(finalTranscript, 'talk');
                            document.getElementById('recognizedText').innerHTML = finalTranscript;
                        }
                    } else {
                        interimTranscript += transcript;
                        document.getElementById('recognizedText').innerHTML = 
                            '<span class="text-gray-400">' + interimTranscript + '</span>';
                    }
                }

                // Set silence timer
                silenceTimer = setTimeout(() => {
                    if (isListening) {
                        document.getElementById('speechStatus').textContent = 'No speech detected, listening...';
                    }
                }, SILENCE_DURATION);
            };

            recognition.onerror = (event) => {
                console.error('Speech recognition error:', event.error);
                if (event.error === 'no-speech' && isListening) {
                    // Don't stop on no-speech error, just show status
                    document.getElementById('speechStatus').textContent = 'No speech detected, listening...';
                }
            };

            // Single toggle button for speech recognition
            document.getElementById('toggleSpeechBtn').addEventListener('click', () => {
                if (!isListening) {
                    recognition.start();
                } else {
                    isListening = false;
                    recognition.stop();
                }
            });
        } else {
            document.getElementById('toggleSpeechBtn').disabled = true;
            document.getElementById('toggleSpeechBtn').title = 'Speech recognition not supported in this browser';
            document.getElementById('speechStatus').textContent = 'Speech recognition not supported in this browser';
        }

        // Event Listeners
        document.querySelector("#startBtn").addEventListener("click", async () => {
            try {
                const selectedAvatar = document.getElementById('avatarSelect').value;
                avatarID.value = selectedAvatar;
                
                setupScreen.style.display = 'none';
                aiControls.classList.add('active');
                
                // Show loader
                document.getElementById('aiLoader').classList.add('active');
                
                await createNewSession();
                await startStreamingSession();

                // Hide loader when everything is ready
                document.getElementById('aiLoader').classList.remove('active');
            } catch (error) {
                console.error('Failed to start session:', error);
                // Show setup screen again on error and hide loader
                setupScreen.style.display = 'block';
                aiControls.classList.remove('active');
                document.getElementById('aiLoader').classList.remove('active');
            }
        });

        document.querySelector("#closeBtn").addEventListener("click", closeSession);

        document.querySelector("#talkBtn").addEventListener("click", () => {
            const text = taskInput.value.trim();
            if (text) {
                sendText(text, "talk");
                taskInput.value = "";
            }
        });

        // Handle Enter key in input
        taskInput.addEventListener("keypress", (event) => {
            if (event.key === "Enter") {
                const text = taskInput.value.trim();
                if (text) {
                    sendText(text, "talk");
                    taskInput.value = "";
                }
            }
        });

        // Handle chat tab switching
        chatTabs.forEach(tab => {
            tab.addEventListener('click', () => {
                // Remove active class from all tabs and contents
                chatTabs.forEach(t => t.classList.remove('active'));
                document.querySelectorAll('.ai-chat-content').forEach(content => {
                    content.classList.remove('active');
                });
                
                // Add active class to clicked tab and corresponding content
                tab.classList.add('active');
                const contentId = tab.getAttribute('data-tab');
                document.getElementById(contentId + 'Chat').classList.add('active');
            });
        });

        // Close session
        async function closeSession() {
            try {
                if (!sessionInfo) {
                    updateStatus("No active session");
                    return;
                }

                // Show loader while closing
                document.getElementById('aiLoader').classList.add('active');

                const response = await fetch(
                    `${API_CONFIG.serverUrl}/v1/streaming.stop`,
                    {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "Authorization": `Bearer ${sessionToken}`,
                        },
                        body: JSON.stringify({
                            session_id: sessionInfo.session_id,
                        }),
                    }
                );

                if (!response.ok) {
                    const errorText = await response.text();
                    throw new Error(`Failed to close session: ${response.status} - ${errorText}`);
                }

                if (room) {
                    room.disconnect();
                }

                mediaElement.srcObject = null;
                sessionInfo = null;
                room = null;
                mediaStream = null;
                sessionToken = null;
                document.querySelector("#startBtn").disabled = false;

                // Show setup screen and hide controls
                setupScreen.style.display = 'block';
                aiControls.classList.remove('active');

                // Hide loader
                document.getElementById('aiLoader').classList.remove('active');

                updateStatus("Session closed");
            } catch (error) {
                updateStatus(`Error: ${error.message}`);
                console.error(error);
                // Hide loader on error
                document.getElementById('aiLoader').classList.remove('active');
            }
        }
    });
</script>
@endpush
@endsection 