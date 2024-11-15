# WordPress to Discord Webhook Plugin

A WordPress plugin that automatically posts newly published content to a Discord channel via Webhooks.

## Features
- Posts new WordPress posts to Discord automatically.
- Easy setup with webhook URL configuration.
- Supports publishing posts with titles, URLs, and content.

## Installation
1. Download and extract the plugin files.
2. Upload the plugin folder to the `/wp-content/plugins/` directory of your WordPress installation.
3. Activate the plugin from the WordPress admin dashboard.

## Setup
1. Go to the plugin settings page in your WordPress admin area.
2. Paste your Discord Webhook URL in the designated field.
3. Save the settings.

## Usage
Once the plugin is activated and the webhook URL is set, it will automatically send a message to your Discord channel whenever a new post is published.

The message sent will contain:
- The title of the post.
- A link to the post.
- A preview of the post content.

## Contributing
Feel free to open issues or pull requests to improve the plugin. Contributions are always welcome!

## License
```markdown
MIT License

Copyright (c) 2024 Saad Aboulhoda

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.
