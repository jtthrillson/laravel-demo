<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .container {
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            padding: 60px 40px;
            text-align: center;
            max-width: 600px;
            width: 100%;
            animation: slideUp 0.6s ease-out;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .checkmark {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            margin: 0 auto 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            animation: scaleIn 0.5s ease-out 0.2s both;
        }

        @keyframes scaleIn {
            from {
                transform: scale(0);
            }
            to {
                transform: scale(1);
            }
        }

        .checkmark svg {
            width: 50px;
            height: 50px;
            stroke: white;
            stroke-width: 3;
            stroke-linecap: round;
            stroke-linejoin: round;
            fill: none;
            animation: drawCheck 0.5s ease-out 0.4s both;
            stroke-dasharray: 100;
            stroke-dashoffset: 100;
        }

        @keyframes drawCheck {
            to {
                stroke-dashoffset: 0;
            }
        }

        h1 {
            font-size: 2.5rem;
            font-weight: 700;
            color: #2d3748;
            margin-bottom: 16px;
        }

        p {
            font-size: 1.125rem;
            color: #718096;
            line-height: 1.6;
        }

        .meta {
            margin-top: 40px;
            padding-top: 30px;
            border-top: 1px solid #e2e8f0;
            display: flex;
            justify-content: center;
            gap: 30px;
            flex-wrap: wrap;
        }

        .meta-item {
            text-align: center;
        }

        .meta-label {
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            color: #a0aec0;
            margin-bottom: 4px;
        }

        .meta-value {
            font-size: 1rem;
            font-weight: 600;
            color: #667eea;
        }

        @media (max-width: 640px) {
            .container {
                padding: 40px 30px;
            }

            h1 {
                font-size: 2rem;
            }

            p {
                font-size: 1rem;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="checkmark">
            <svg viewBox="0 0 52 52">
                <path d="M14 27l8 8 16-16"/>
            </svg>
        </div>

        <h1>Deployment Successful</h1>
        <p>Your Laravel application is running smoothly in production mode.</p>

        <div class="meta">
            <div class="meta-item">
                <div class="meta-label">Environment</div>
                <div class="meta-value">{{ app()->environment() }}</div>
            </div>
            <div class="meta-item">
                <div class="meta-label">Laravel</div>
                <div class="meta-value">v{{ app()->version() }}</div>
            </div>
            <div class="meta-item">
                <div class="meta-label">PHP</div>
                <div class="meta-value">{{ PHP_VERSION }}</div>
            </div>
            <div class="meta-item">
                <div class="meta-label">Deployed</div>
                <div class="meta-value">
                    @php
                        $deployTimestamp = storage_path('app/deployment_timestamp.txt');
                        echo file_exists($deployTimestamp)
                            ? trim(file_get_contents($deployTimestamp))
                            : 'N/A';
                    @endphp
                </div>
            </div>
        </div>
    </div>
</body>
</html>