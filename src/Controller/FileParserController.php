<?php

namespace App\Controller;

use App\Service\FileParserService;
use App\Service\FileUploader;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class FileParserController extends AbstractController
{
    /**
     * This route is used for rendering a file upload form.
     *
     * @Route("/")
     */
    public function index()
    {
        return $this->render('index.html.twig');
    }

    /**
     * @Route("/parse", name="parse")
     *
     * @param Request $request
     * @param string $uploadDir
     * @param FileUploader $uploader
     * @param FileParserService $fileParserService
     *
     * @return Response
     */
    public function parseUploadedFile(
        Request $request,
        string $uploadDir,
        FileUploader $uploader,
        FileParserService $fileParserService
    ): Response {
        $file = $request->files->get('fileToParse');

        if (empty($file)) {
            return new Response(
                "No file specified or file type is not valid.",
                Response::HTTP_UNPROCESSABLE_ENTITY, ['content-type' => 'text/plain']
            );
        }

        if ($file->getClientOriginalExtension() !== 'txt') {
            return new Response(
                "File type is not valid. Uploaded file should be .txt",
                Response::HTTP_UNPROCESSABLE_ENTITY, ['content-type' => 'text/plain']
            );
        }

        $filename = $file->getClientOriginalName();
        $uploader->upload($uploadDir, $file, $filename);

        $content = file_get_contents($uploadDir . '/' . $filename);

        if (!$content) {
            return new Response(
                "File could not be loaded",
                Response::HTTP_UNPROCESSABLE_ENTITY, ['content-type' => 'text/plain']
            );
        }

        $parsedContent = $fileParserService->getParsedContent($content);

        return $this->render('fileParser.html.twig', [
            'originalText' => $content,
            'parsedContent' => $parsedContent,
        ]);
    }
}
