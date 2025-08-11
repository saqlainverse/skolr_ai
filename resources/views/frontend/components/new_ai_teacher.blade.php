@push('css')
    <style>
        .ai-teacher-section {
            background: #fff;
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 0;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            width: 100%;
            height: 100%;
        }

        .ai-controls {
            display: none;
        }

        .ai-controls.active {
            display: block;
        }

        .ai-setup-screen {
            max-width: 100%;
            margin: 20px auto;
            text-align: center;
            padding: 20px;
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
            max-width: 100%;
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

<div class="ai-teacher-section">
    <!-- Loader -->
    <div class="ai-loader-container" id="aiLoader">
        <div class="ai-loader"></div>
        <div class="ai-loader-text">Initializing AI Teacher...</div>
    </div>

    <!-- Initial Setup Screen -->
    <div class="ai-setup-screen" id="setupScreen">
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
                <option
