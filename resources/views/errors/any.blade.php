<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error {{ $exception->getStatusCode() ?? 'Error' }} | {{ config('app.name', 'FastPay Saver') }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #4f46e5;
            --primary-dark: #4338ca;
            --error: #dc2626;
            --warning: #f59e0b;
            --success: #10b981;
            --gray-900: #111827;
            --gray-700: #374151;
            --gray-500: #6b7280;
            --gray-300: #d1d5db;
            --gray-100: #f3f4f6;
            --white: #ffffff;
            --shadow-sm: 0 1px 2px 0 rgba(0,0,0,0.05);
            --shadow-md: 0 4px 6px -1px rgba(0,0,0,0.1), 0 2px 4px -1px rgba(0,0,0,0.06);
            --shadow-lg: 0 10px 15px -3px rgba(0,0,0,0.1), 0 4px 6px -2px rgba(0,0,0,0.05);
            --radius-sm: 0.375rem;
            --radius-md: 0.5rem;
            --radius-lg: 0.75rem;
        }
        
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }
        
        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            background-color: var(--gray-100);
            color: var(--gray-900);
            line-height: 1.5;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 1.5rem;
        }
        
        .error-card {
            background: var(--white);
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow-lg);
            width: 100%;
            max-width: 640px;
            padding: 3rem;
            text-align: center;
            position: relative;
            overflow: hidden;
            border-top: 4px solid var(--error);
        }
        
        .error-card.warning { border-top-color: var(--warning); }
        .error-card.success { border-top-color: var(--success); }
        
        .error-icon {
            font-size: 3rem;
            margin-bottom: 1.5rem;
            color: var(--error);
        }
        .warning .error-icon { color: var(--warning); }
        .success .error-icon { color: var(--success); }
        
        .error-header {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-bottom: 1.5rem;
        }
        
        .error-title {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            color: var(--gray-900);
        }
        
        .error-code {
            font-size: 0.875rem;
            font-weight: 600;
            color: var(--gray-500);
            background: var(--gray-100);
            padding: 0.25rem 0.75rem;
            border-radius: var(--radius-sm);
            display: inline-block;
        }
        
        .error-message {
            font-size: 1.125rem;
            color: var(--gray-700);
            margin-bottom: 2rem;
            line-height: 1.6;
        }
        
        .error-actions {
            display: flex;
            gap: 1rem;
            justify-content: center;
            flex-wrap: wrap;
            margin-top: 2rem;
        }
        
        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            padding: 0.75rem 1.5rem;
            border-radius: var(--radius-md);
            font-weight: 600;
            font-size: 1rem;
            cursor: pointer;
            transition: all 0.2s ease;
            text-decoration: none;
            border: 2px solid transparent;
        }
        
        .btn-primary {
            background-color: var(--primary);
            color: var(--white);
        }
        
        .btn-primary:hover {
            background-color: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: var(--shadow-md);
        }
        
        .btn-outline {
            background-color: transparent;
            color: var(--primary);
            border-color: var(--primary);
        }
        
        .btn-outline:hover {
            background-color: rgba(79, 70, 229, 0.1);
            transform: translateY(-2px);
            box-shadow: var(--shadow-sm);
        }
        
        .error-footer {
            margin-top: 3rem;
            color: var(--gray-500);
            font-size: 0.875rem;
        }
        
        .error-logo {
            margin-bottom: 1.5rem;
            max-width: 180px;
            height: auto;
        }
        
        /* Responsive adjustments */
        @media (max-width: 640px) {
            .error-card {
                padding: 2rem 1.5rem;
            }
            
            .error-title {
                font-size: 1.75rem;
            }
            
            .error-message {
                font-size: 1rem;
            }
            
            .error-actions {
                flex-direction: column;
                gap: 0.75rem;
            }
            
            .btn {
                width: 100%;
            }
        }
        
        /* Animation */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .animate-in {
            animation: fadeIn 0.5s ease-out forwards;
        }
    </style>
</head>
<body>
    <div class="error-card animate-in {{ $exception->getStatusCode() == 403 ? 'warning' : ($exception->getStatusCode() == 404 ? '' : 'error') }}">
        <!-- Company Logo -->
        <img src="logo.png" alt="FastPay Saver" class="error-logo">
        
        <!-- Error Icon (changes based on error type) -->
        <div class="error-icon">
            @if($exception->getStatusCode() == 403)
                <i class="fas fa-lock"></i>
            @elseif($exception->getStatusCode() == 404)
                <i class="fas fa-map-marker-alt"></i>
            @elseif($exception->getStatusCode() == 500)
                <i class="fas fa-server"></i>
            @else
                <i class="fas fa-exclamation-circle"></i>
            @endif
        </div>
        
        <div class="error-header">
            <h1 class="error-title">
                @if($exception->getStatusCode() == 403)
                    Access Denied
                @elseif($exception->getStatusCode() == 404)
                    Page Not Found
                @elseif($exception->getStatusCode() == 419)
                    Session Expired
                @elseif($exception->getStatusCode() == 429)
                    Too Many Requests
                @elseif($exception->getStatusCode() == 500)
                    Server Error
                @elseif($exception->getStatusCode() == 503)
                    Maintenance Mode
                @else
                    Something Went Wrong
                @endif
            </h1>
            <span class="error-code">
                @if($exception->getStatusCode())
                    HTTP {{ $exception->getStatusCode() }}
                @else
                    Application Error
                @endif
            </span>
        </div>
        
        <div class="error-message">
            @if($exception->getMessage())
                {{ $exception->getMessage() }}
            @else
                @if($exception->getStatusCode() == 403)
                    You don't have permission to access this resource.
                @elseif($exception->getStatusCode() == 404)
                    The page you're looking for doesn't exist or has been moved.
                @elseif($exception->getStatusCode() == 419)
                    Your session has expired. Please refresh and try again.
                @elseif($exception->getStatusCode() == 429)
                    You've sent too many requests. Please wait and try again.
                @elseif($exception->getStatusCode() == 500)
                    We're experiencing server issues. Our team has been notified.
                @elseif($exception->getStatusCode() == 503)
                    We're currently down for maintenance. Please check back soon.
                @else
                    An unexpected error occurred. Our team has been notified.
                @endif
            @endif
        </div>
        
        <div class="error-actions">
            <a href="{{ url('/') }}" class="btn btn-primary">
                <i class="fas fa-home"></i> Return Home
            </a>
            <a href="{{ url()->previous() }}" class="btn btn-outline">
                <i class="fas fa-arrow-left"></i> Go Back
            </a>
            <a href="mailto:support@fastpaysaverbc.com" class="btn btn-outline">
                <i class="fas fa-envelope"></i> Contact Support
            </a>
        </div>
        
        <div class="error-footer">
            &copy; {{ date('Y') }} FastPay Saver. All rights reserved.
        </div>
    </div>
</body>
</html>