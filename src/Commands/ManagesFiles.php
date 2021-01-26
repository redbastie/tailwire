<?php

namespace Redbastie\Tailwire\Commands;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Str;

trait ManagesFiles
{
    private $filesystem;

    private function filesystem()
    {
        if (!$this->filesystem) {
            $this->filesystem = new Filesystem;
        }

        return $this->filesystem;
    }

    protected function createFiles($stubFolder, $replaces = [])
    {
        foreach ($this->filesystem()->allFiles(__DIR__ . '/../../resources/stubs/' . $stubFolder) as $file) {
            if ($fileDir = $this->replace($replaces, $file->getRelativePath())) {
                $this->filesystem()->ensureDirectoryExists($fileDir);
            }

            $filePath = $this->replace($replaces, Str::replaceLast('.stub', '', $file->getRelativePathname()));
            $this->filesystem()->put($filePath, $this->replace($replaces, $file->getContents()));
            $this->warn("Created file: <info>$filePath</info>");
        }
    }

    protected function deleteFile($filePath)
    {
        if ($this->filesystem()->exists($filePath)) {
            $this->filesystem()->delete($filePath);
            $this->warn("Deleted file: <info>$filePath</info>");
        }
    }

    private function replace($replaces, $contents)
    {
        foreach ($replaces as $search => $replace) {
            $contents = str_replace($search, $replace, $contents);
        }

        return $contents;
    }
}
