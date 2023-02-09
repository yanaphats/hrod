<?php

namespace Enums;

class FileTypeEnum extends AbstractEnum
{
    const IMAGE 		= ['apng', 'avif', 'gif', 'jpg', 'jpeg', 'jfif', 'pjpeg', 'pjp', 'png', 'svg', 'webp'];
	const MEDIA 		= ['mp4', 'webm', 'ogg'];
	const SCRIPT		= ['js', 'ts'];
	const STYLE			= ['css', 'sass'];
}
