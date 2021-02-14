<?php


namespace MinimaxApi\Models;


use GuzzleHttp\Client;
use MinimaxApi\Traits\ModelConstructor;
use MinimaxApi\Traits\Response;

class DocumentAttachment
{
    use ModelConstructor;

    // Document attachment id.
    // Mandatory field. Ignored on create request.
    public $DocumentAttachmentId;
    // Document.
    public $Document;
    // Attachment description.
    // Mandatory field. Max length: 8000
    public $Description;
    // Attachment data.
    public $AttachmentData;
    // Attachment name for file.
    // Max length: 250
    public $FileName;
    // Attachment mime type.
    // Max length: 250
    public $MimeType;
    // Entry date.
    public $EntryDate;
    public $RecordDtModified;
    // Row version is used for concurrency check.
    // Mandatory field. Ignored on create request.
    public $RowVersion;

    /**
     * @var Client
     */
    protected $client;

    /**
     * Access token.
     */
    protected $accessToken;

    /**
     * Organisation id.
     */
    protected $organizationId;

    /**
     * Model name.
     */
    private $model_name = "documents";

    public function getDocumentAttachment($documentId, $attachmentId){
        $response = $this->client->request('GET', MinimaxApi::API_URL . "api/orgs/" . $this->organizationId . "/" . $this->model_name . "/${documentId}/attachments/$attachmentId");

        return Response::model($response, $this);
    }
}