<?php

namespace Simtabi\Pheg\Facets\File;

use finfo;

class FileInfo
{


    const INFO_RELPATH              = 'relpath';
    const INFO_ABSPATH              = 'abspath';
    const INFO_BASENAME             = 'basename';
    const INFO_FILENAME             = 'filename';
    const INFO_EXTENSION            = 'extension';
    const INFO_MIMETYPE             = "mimetype";
    const INFO_MIMETYPE_EXTENSION   = "mimetypeExtension";
    const INFO_FILETYPE             = "filetype";
    const INFO_TYPE                 = "type";
    const INFO_SIZE                 = "size";
    const INFO_DESCRIPTION          = "description";

    const CONTENT_HEADER            = "header";
    const CONTENT_DATA              = "content";
    const CONTENT_BASE64            = "base64";
    const CONTENT_DATA64            = "data64";
    const CONTENT_MD5               = "md5";
    const CONTENT_SHA1              = "sha1";
    const CONTENT_ROWS              = "rows";

    const IMAGE_THUMBNAIL           = "thumbnail";
    const IMAGE_WIDTH               = "width";
    const IMAGE_HEIGHT              = "height";
    const IMAGE_ORIENTATION         = "orientation";
    const IMAGE_BITS                = "bits";
    const IMAGE_CHANNELS            = "channels";
    const IMAGE_EXIF                = "exif";

    const AUDIO_ID3TAGS             = "id3Tags";

    const DATABASE                  = [
        // "x-world/x-3dmf" => "",
        // "application/x-authorware-bin" => "",
        // "application/x-authorware-map" => "",
        // "application/x-authorware-seg" => "",
        // "text/vnd.abc" => "text",
        // "video/animaflex" => "video",
        // "application/postscript" => "",
        // "audio/aiff" => "audio",
        // "audio/x-aiff" => "audio",
        // "application/x-aim" => "",
        // "text/x-audiosoft-intra" => "audiotext",
        // "application/x-navi-animation" => "",
        // "application/x-nokia-9000-communicator-add-on-software" => "",
        // "application/mime" => "",
        // "application/arj" => "",
        // "image/x-jg" => "image",
        // "video/x-ms-asf" => "video",
        // "text/x-asm" => "text",
        // "text/asp" => "text",
        // "application/x-mplayer2" => "",
        // "video/x-ms-asf-plugin" => "video",
        // "audio/basic" => "audio",
        // "audio/x-au" => "audio",
        // "application/x-troff-msvideo" => "video",
        // "video/avi" => "video",
        // "video/msvideo" => "video",
        // "video/x-msvideo" => "video",
        // "video/avs-video" => "video",
        // "application/x-bcpio" => "",
        // "application/mac-binary" => "",
        // "application/macbinary" => "",
        // "application/x-binary" => "",
        // "application/x-macbinary" => "",
        // "image/bmp" => "image",
        // "image/x-windows-bmp" => "image",
        // "application/book" => "",
        // "application/x-bzip2" => "",
        // "application/x-bsh" => "",
        // "application/x-bzip" => "",
        // "text/plain" => "text",
        // "text/x-c" => "text",
        // "application/vnd.ms-pki.seccat" => "",
        // "application/clariscad" => "",
        // "application/x-cocoa" => "",
        // "application/cdf" => "",
        // "application/x-cdf" => "",
        // "application/x-netcdf" => "",
        // "application/pkix-cert" => "",
        // "application/x-x509-ca-cert" => "",
        // "application/x-chat" => "",
        // "application/java" => "",
        // "application/java-byte-code" => "",
        // "application/x-java-class" => "",
        // "application/x-cpio" => "",
        // "application/mac-compactpro" => "",
        // "application/x-compactpro" => "",
        // "application/x-cpt" => "",
        // "application/pkcs-crl" => "",
        // "application/pkix-crl" => "",
        // "application/pkix-cert" => "",
        // "application/x-x509-ca-cert" => "",
        // "application/x-x509-user-cert" => "",
        // "application/x-csh" => "",
        // "text/x-script.csh" => "text",
        // "application/x-pointplus" => "",
        // "text/css" => "text",
        // "application/x-director" => "",
        // "application/x-deepv" => "",
        // "application/x-x509-ca-cert" => "",
        // "video/x-dv" => "video",
        // "application/x-director" => "",
        // "video/dl" => "video",
        // "video/x-dl" => "video",
        // "application/msword" => "",
        // "application/msword" => "",
        // "application/commonground" => "",
        // "application/drafting" => "",
        // "video/x-dv" => "video",
        // "application/x-dvi" => "",
        // "drawing/x-dwf (old)" => "",
        // "model/vnd.dwf" => "",
        // "application/acad" => "",
        // "image/vnd.dwg" => "image",
        // "image/x-dwg" => "image",
        // "application/dxf" => "",
        // "image/vnd.dwg" => "image",
        // "image/x-dwg" => "image",
        // "application/x-director" => "",
        // "text/x-script.elisp" => "text",
        // "application/x-bytecode.elisp (compiled elisp)" => "",
        // "application/x-elc" => "",
        // "application/x-envoy" => "",
        // "application/x-esrehber" => "",
        // "text/x-setext" => "text",
        // "application/envoy" => "",
        // "application/x-envoy" => "",
        // "text/x-fortran" => "text",
        // "text/x-fortran" => "text",
        // "text/x-fortran" => "text",
        // "application/vnd.fdf" => "",
        // "application/fractals" => "",
        // "image/fif" => "image",
        // "video/fli" => "video",
        // "video/x-fli" => "video",
        // "image/florian" => "image",
        // "text/vnd.fmi.flexstor" => "text",
        // "video/x-atomic3d-feature" => "video",
        // "text/x-fortran" => "text",
        // "image/vnd.fpx" => "image",
        // "image/vnd.net-fpx" => "image",
        // "application/freeloader" => "",
        // "audio/make" => "audio",
        // "image/g3fax" => "image",
        // "image/gif" => "image",
        // "video/gl" => "video",
        // "video/x-gl" => "video",
        // "audio/x-gsm" => "audio",
        // "audio/x-gsm" => "audio",
        // "application/x-gsp" => "",
        // "application/x-gss" => "",
        // "application/x-gtar" => "",
        // "application/x-compressed" => "",
        // "application/x-gzip" => "",
        // "application/x-gzip" => "",
        // "multipart/x-gzip" => "",
        // "text/x-h" => "text",
        // "application/x-hdf" => "",
        // "application/x-helpfile" => "",
        // "application/vnd.hp-hpgl" => "",
        // "text/x-h" => "text",
        // "text/x-script" => "text",
        // "application/hlp" => "",
        // "application/x-helpfile" => "",
        // "application/x-winhelp" => "",
        // "application/vnd.hp-hpgl" => "",
        // "application/vnd.hp-hpgl" => "",
        // "application/binhex" => "",
        // "application/binhex4" => "",
        // "application/mac-binhex" => "",
        // "application/mac-binhex40" => "",
        // "application/x-binhex40" => "",
        // "application/x-mac-binhex40" => "",
        // "application/hta" => "",
        // "text/x-component" => "text",
        // "text/webviewhtml" => "text",
        // "text/html" => "text",
        // "x-conference/x-cooltalk" => "",
        // "image/x-icon" => "image",
        // "image/ief" => "image",
        // "image/ief" => "image",
        // "application/iges" => "",
        // "model/iges" => "",
        // "application/iges" => "",
        // "model/iges" => "",
        // "application/x-ima" => "",
        // "application/x-httpd-imap" => "",
        // "application/inf" => "",
        // "application/x-internett-signup" => "",
        // "application/x-ip2" => "",
        // "video/x-isvideo" => "video",
        // "audio/it" => "audio",
        // "application/x-inventor" => "",
        // "i-world/i-vrml" => "",
        // "application/x-livescreen" => "",
        // "audio/x-jam" => "audio",
        // "text/x-java-source" => "text",
        // "text/x-java-source" => "text",
        // "application/x-java-commerce" => "",
        // "image/jpeg" => "image",
        // "image/pjpeg" => "image",
        // "image/x-jps" => "image",
        // "application/x-javascript" => "",
        // "application/javascript" => "",
        // "application/ecmascript" => "",
        // "text/javascript" => "text",
        // "text/ecmascript" => "text",
        // "image/jutvision" => "image",
        // "audio/midi" => "audio",
        // "music/x-karaoke" => "",
        // "application/x-ksh" => "",
        // "text/x-script.ksh" => "text",
        // "audio/nspaudio" => "audio",
        // "audio/x-nspaudio" => "audio",
        // "audio/x-liveaudio" => "audio",
        // "application/x-latex" => "",
        // "application/lha" => "",
        // "application/x-lha" => "",
        // "audio/nspaudio" => "audio",
        // "audio/x-nspaudio" => "audio",
        // "application/x-lisp" => "",
        // "text/x-script.lisp" => "text",
        // "text/x-la-asf" => "text",
        // "application/x-latex" => "",
        // "application/octet-stream" => "",
        // "application/x-lzh" => "",
        // "application/lzx" => "",
        // "application/x-lzx" => "",
        // "text/x-m" => "text",
        // "video/mpeg" => "video",
        // "audio/mpeg" => "audio",
        // "audio/x-mpequrl" => "audio",
        // "application/x-troff-man" => "",
        // "application/x-navimap" => "",
        // "application/mbedlet" => "",
        // "application/x-magic-cap-package-1.0" => "",
        // "application/mcad" => "",
        // "application/x-mathcad" => "",
        // "image/vasa" => "image",
        // "text/mcf" => "text",
        // "application/netmc" => "",
        // "application/x-troff-me" => "",
        // "message/rfc822" => "",
        // "message/rfc822" => "",
        // "application/x-midi" => "",
        // "audio/midi" => "audio",
        // "audio/x-mid" => "audio",
        // "audio/x-midi" => "audio",
        // "music/crescendo" => "",
        // "x-music/x-midi" => "",
        // "application/x-midi" => "",
        // "audio/midi" => "audio",
        // "audio/x-mid" => "audio",
        // "audio/x-midi" => "audio",
        // "music/crescendo" => "",
        // "x-music/x-midi" => "",
        // "application/x-frame" => "",
        // "application/x-mif" => "",
        // "message/rfc822" => "",
        // "www/mime" => "",
        // "audio/x-vnd.audioexplosion.mjuicemediafile" => "audio",
        // "video/x-motion-jpeg" => "video",
        // "application/base64" => "",
        // "application/x-meme" => "",
        // "application/base64" => "",
        // "audio/mod" => "audio",
        // "audio/x-mod" => "audio",
        // "video/quicktime" => "video",
        // "video/quicktime" => "video",
        // "video/x-sgi-movie" => "video",
        // "audio/x-mpeg" => "audio",
        // "video/x-mpeg" => "video",
        // "video/x-mpeq2a" => "video",
        // "audio/mpeg3" => "audio",
        // "audio/x-mpeg-3" => "audio",
        // "video/x-mpeg" => "video",
        // "application/x-project" => "",
        // "application/vnd.ms-project" => "",
        // "application/marc" => "",
        // "application/x-troff-ms" => "",
        // "video/x-sgi-movie" => "video",
        // "audio/make" => "audio",
        // "application/x-vnd.audioexplosion.mzz" => "audio",
        // "image/naplps" => "image",
        // "image/naplps" => "image",
        // "application/vnd.nokia.configuration-message" => "",
        // "image/x-niff" => "image",
        // "image/x-niff" => "image",
        // "image/svg+xml" => "image",
        // "image/svg" => "image",
        // "application/x-mix-transfer" => "",
        // "application/x-conference" => "",
        // "application/x-navidoc" => "",
        // "application/oda" => "",
        // "application/x-omc" => "",
        // "application/x-omcdatamaker" => "",
        // "application/x-omcregerator" => "",
        // "text/x-pascal" => "text",
        // "application/pkcs10" => "",
        // "application/x-pkcs10" => "",
        // "application/pkcs-12" => "",
        // "application/x-pkcs12" => "",
        // "application/x-pkcs7-signature" => "",
        // "application/pkcs7-mime" => "",
        // "application/x-pkcs7-mime" => "",
        // "application/pkcs7-mime" => "",
        // "application/x-pkcs7-mime" => "",
        // "application/x-pkcs7-certreqresp" => "",
        // "application/pkcs7-signature" => "",
        // "application/pro_eng" => "",
        // "text/pascal" => "text",
        // "image/x-portable-bitmap" => "image",
        // "application/vnd.hp-pcl" => "",
        // "application/x-pcl" => "",
        // "image/x-pict" => "image",
        // "image/x-pcx" => "image",
        // "application/pdf" => "pdf",
        // "audio/make" => "audio",
        // "audio/make.my.funk" => "audio",
        // "image/x-portable-graymap" => "image",
        // "image/x-portable-greymap" => "image",
        // "image/pict" => "image",
        // "image/pict" => "image",
        // "application/x-newton-compatible-pkg" => "",
        // "application/vnd.ms-pki.pko" => "",
        // "text/x-script.perl" => "text",
        // "application/x-pixclscript" => "",
        // "image/x-xpixmap" => "image",
        // "text/x-script.perl-module" => "text",
        // "application/x-pagemaker" => "",
        // "application/x-pagemaker" => "",
        // "image/png" => "image",
        // "application/x-portable-anymap" => "",
        // "image/x-portable-anymap" => "image",
        // "application/mspowerpoint" => "",
        // "application/vnd.ms-powerpoint" => "",
        // "model/x-pov" => "",
        // "application/vnd.ms-powerpoint" => "",
        // "image/x-portable-pixmap" => "image",
        // "application/mspowerpoint" => "",
        // "application/vnd.ms-powerpoint" => "",
        // "application/mspowerpoint" => "",
        // "application/powerpoint" => "",
        // "application/vnd.ms-powerpoint" => "",
        // "application/x-mspowerpoint" => "",
        // "application/mspowerpoint" => "",
        // "application/x-freelance" => "",
        // "application/pro_eng" => "",
        // "paleovu/x-pv" => "",
        // "application/vnd.ms-powerpoint" => "",
        // "text/x-script.phyton" => "text",
        // "application/x-bytecode.python" => "",
        // "audio/vnd.qcelp" => "audio",
        // "image/x-quicktime" => "image",
        // "video/quicktime" => "video",
        // "video/x-qtc" => "video",
        // "image/x-quicktime" => "image",
        // "image/x-quicktime" => "image",
        // "audio/x-pn-realaudio" => "audio",
        // "audio/x-pn-realaudio-plugin" => "audio",
        // "audio/x-realaudio" => "audio",
        // "audio/x-pn-realaudio" => "audio",
        // "application/x-cmu-raster" => "",
        // "image/cmu-raster" => "image",
        // "image/x-cmu-raster" => "image",
        // "image/cmu-raster" => "image",
        // "text/x-script.rexx" => "text",
        // "image/vnd.rn-realflash" => "image",
        // "image/x-rgb" => "image",
        // "application/vnd.rn-realmedia" => "",
        // "audio/x-pn-realaudio" => "audio",
        // "audio/mid" => "audio",
        // "audio/x-pn-realaudio" => "audio",
        // "audio/x-pn-realaudio" => "audio",
        // "audio/x-pn-realaudio-plugin" => "audio",
        // "application/ringing-tones" => "",
        // "application/vnd.nokia.ringing-tone" => "",
        // "application/vnd.rn-realplayer" => "",
        // "application/x-troff" => "",
        // "image/vnd.rn-realpix" => "image",
        // "audio/x-pn-realaudio-plugin" => "audio",
        // "text/richtext" => "text",
        // "text/vnd.rn-realtext" => "text",
        // "application/rtf" => "",
        // "application/x-rtf" => "",
        // "text/richtext" => "text",
        // "application/rtf" => "",
        // "text/richtext" => "text",
        // "video/vnd.rn-realvideo" => "video",
        // "audio/s3m" => "audio",
        // "application/x-tbook" => "",
        // "application/x-lotusscreencam" => "",
        // "text/x-script.guile" => "text",
        // "text/x-script.scheme" => "text",
        // "video/x-scm" => "video",
        // "application/sdp" => "",
        // "application/x-sdp" => "",
        // "application/sounder" => "",
        // "application/sea" => "",
        // "application/x-sea" => "",
        // "application/set" => "",
        // "text/sgml" => "text",
        // "text/x-sgml" => "text",
        // "text/sgml" => "text",
        // "text/x-sgml" => "text",

        // "application/x-sh" => "",
        // "application/x-shar" => "",
        // "text/x-script.sh" => "text",

        // "application/x-shar" => "",
        // "text/x-server-parsed-html" => "text",
        // "audio/x-psid" => "audio",
        // "application/x-sit" => "",
        // "application/x-stuffit" => "",
        // "application/x-koan" => "",
        // "application/x-seelogo" => "",
        // "application/smil" => "",
        // "application/smil" => "",
        // "audio/x-adpcm" => "audio",
        // "application/solids" => "",
        // "application/x-pkcs7-certificates" => "",
        // "text/x-speech" => "text",
        // "application/futuresplash" => "",
        // "application/x-sprite" => "",
        // "application/x-sprite" => "",
        // "application/x-wais-source" => "",
        // "text/x-server-parsed-html" => "text",
        // "application/streamingmedia" => "",
        // "application/vnd.ms-pki.certstore" => "",
        // "application/step" => "",
        // "application/sla" => "",
        // "application/vnd.ms-pki.stl" => "",
        // "application/x-navistyle" => "",
        // "application/step" => "",
        // "application/x-sv4cpio" => "",
        // "application/x-sv4crc" => "",
        // "image/vnd.dwg" => "image",
        // "image/x-dwg" => "image",
        // "application/x-world" => "",
        // "x-world/x-svr" => "",
        // "application/x-shockwave-flash" => "",
        // "application/x-troff" => "",
        // "text/x-speech" => "text",
        // "application/x-tar" => "",
        // "application/toolbook" => "",
        // "application/x-tbook" => "",
        // "application/x-tcl" => "",
        // "text/x-script.tcl" => "text",
        // "text/x-script.tcsh" => "text",
        // "application/x-tex" => "",
        // "application/x-texinfo" => "",
        // "application/x-texinfo" => "",
        // "application/plain" => "",
        // "application/gnutar" => "",
        // "image/tiff" => "image",
        // "image/x-tiff" => "image",
        // "image/tiff" => "image",
        // "image/x-tiff" => "image",
        // "application/x-troff" => "",
        // "audio/tsp-audio" => "audio",
        // "application/dsptype" => "",
        // "audio/tsplayer" => "audio",
        // "text/tab-separated-values" => "text",
        // "image/florian" => "image",
        // "text/x-uil" => "text",
        // "text/uri-list" => "text",
        // "text/uri-list" => "text",
        // "application/i-deas" => "",
        // "text/uri-list" => "text",
        // "text/uri-list" => "text",
        // "application/x-ustar" => "",
        // "multipart/x-ustar" => "",
        // "text/x-uuencode" => "text",
        // "text/x-uuencode" => "text",
        // "application/x-cdlink" => "",
        // "text/x-vcalendar" => "text",
        // "application/vda" => "",
        // "video/vdo" => "video",
        // "application/groupwise" => "",
        // "video/vivo" => "video",
        // "video/vnd.vivo" => "video",
        // "video/vivo" => "video",
        // "video/vnd.vivo" => "video",
        // "application/vocaltec-media-desc" => "",
        // "application/vocaltec-media-file" => "",
        // "audio/voc" => "audio",
        // "audio/x-voc" => "audio",
        // "video/vosaic" => "video",
        // "audio/voxware" => "audio",
        // "audio/x-twinvq-plugin" => "audio",
        // "audio/x-twinvq" => "audio",
        // "audio/x-twinvq-plugin" => "audio",
        // "application/x-vrml" => "",
        // "model/vrml" => "",
        // "x-world/x-vrml" => "",
        // "x-world/x-vrt" => "",
        // "application/x-visio" => "",
        // "application/x-visio" => "",
        // "application/x-visio" => "",
        // "application/wordperfect6.0" => "",
        // "application/wordperfect6.1" => "",
        // "application/msword" => "",
        // "audio/wav" => "audio",
        // "audio/x-wav" => "audio",
        // "application/x-qpro" => "",
        // "image/vnd.wap.wbmp" => "image",
        // "application/vnd.xara" => "",
        // "application/msword" => "",
        // "application/x-123" => "",
        // "windows/metafile" => "",
        // "text/vnd.wap.wml" => "text",
        // "application/vnd.wap.wmlc" => "",
        // "text/vnd.wap.wmlscript" => "text",
        // "application/vnd.wap.wmlscriptc" => "",
        // "application/msword" => "",
        // "application/wordperfect6.0" => "",
        // "application/wordperfect" => "",
        // "application/x-wpwin" => "",
        // "application/x-lotus" => "",
        // "application/mswrite" => "",
        // "application/x-wri" => "",
        // "application/x-world" => "",
        // "model/vrml" => "",
        // "x-world/x-vrml" => "",
        // "model/vrml" => "",
        // "x-world/x-vrml" => "",
        // "text/scriplet" => "text",
        // "application/x-wais-source" => "",
        // "application/x-wintalk" => "",
        // "image/x-xbitmap" => "image",
        // "image/x-xbm" => "image",
        // "image/xbm" => "image",
        // "video/x-amt-demorun" => "video",
        // "xgl/drawing" => "",
        // "image/vnd.xiff" => "image",
        // "application/vnd.ms-excel" => "",
        // "application/x-msexcel" => "",
        // "application/x-excel" => "",
        // "application/excel" => "",
        // "audio/xm" => "audio",
        // "application/xml" => "",
        // "text/xml" => "text",
        // "xgl/movie" => "",
        // "application/x-vnd.ls-xpix" => "",
        // "image/x-xpixmap" => "image",
        // "image/xpm" => "image",
        // "image/png" => "image",
        // "video/x-amt-showrun" => "video",
        // "image/x-xwd" => "image",
        // "image/x-xwindowdump" => "image",
        // "chemical/x-pdb" => "",
        // "application/x-compress" => "",
        // "application/x-zip-compressed" => "",
        // "application/zip" => "",
        // "multipart/x-zip" => "",
        // "text/x-script.zsh" => "text"



        'application/andrew-inset' => 'ez',
        'application/applixware' => 'aw',
        'application/atom+xml' => 'atom',
        'application/atomcat+xml' => 'atomcat',
        'application/atomsvc+xml' => 'atomsvc',
        'application/ccxml+xml' => 'ccxml',
        'application/cdmi-capability' => 'cdmia',
        'application/cdmi-container' => 'cdmic',
        'application/cdmi-domain' => 'cdmid',
        'application/cdmi-object' => 'cdmio',
        'application/cdmi-queue' => 'cdmiq',
        'application/cu-seeme' => 'cu',
        'application/davmount+xml' => 'davmount',
        'application/docbook+xml' => 'dbk',
        'application/dssc+der' => 'dssc',
        'application/dssc+xml' => 'xdssc',
        'application/ecmascript' => 'ecma',
        'application/emma+xml' => 'emma',
        'application/epub+zip' => 'epub',
        'application/exi' => 'exi',
        'application/font-tdpfr' => 'pfr',
        'application/gml+xml' => 'gml',
        'application/gpx+xml' => 'gpx',
        'application/gxf' => 'gxf',
        'application/hyperstudio' => 'stk',
        'application/inkml+xml' => 'ink',
        'application/ipfix' => 'ipfix',
        'application/java-archive' => 'jar',
        'application/java-serialized-object' => 'ser',
        'application/java-vm' => 'class',
        'application/javascript' => 'js',
        'application/json' => 'json',
        'application/jsonml+json' => 'jsonml',
        'application/lost+xml' => 'lostxml',
        'application/mac-binhex40' => 'hqx',
        'application/mac-compactpro' => 'cpt',
        'application/mads+xml' => 'mads',
        'application/marc' => 'mrc',
        'application/marcxml+xml' => 'mrcx',
        'application/mathematica' => 'ma',
        'application/mathml+xml' => 'mathml',
        'application/mbox' => 'mbox',
        'application/mediaservercontrol+xml' => 'mscml',
        'application/metalink+xml' => 'metalink',
        'application/metalink4+xml' => 'meta4',
        'application/mets+xml' => 'mets',
        'application/mods+xml' => 'mods',
        'application/mp21' => 'm21',
        'application/mp4' => 'mp4s',
        'application/msword' => 'doc',
        'application/mxf' => 'mxf',
        'application/octet-stream' => 'bin',
        'application/oda' => 'oda',
        'application/oebps-package+xml' => 'opf',
        'application/ogg' => 'ogx',
        'application/omdoc+xml' => 'omdoc',
        'application/onenote' => 'onetoc',
        'application/oxps' => 'oxps',
        'application/patch-ops-error+xml' => 'xer',
        'application/pdf' => 'pdf',
        'application/pgp-encrypted' => 'pgp',
        'application/pgp-signature' => 'asc',
        'application/pics-rules' => 'prf',
        'application/pkcs10' => 'p10',
        'application/pkcs7-mime' => 'p7m',
        'application/pkcs7-signature' => 'p7s',
        'application/pkcs8' => 'p8',
        'application/pkix-attr-cert' => 'ac',
        'application/pkix-cert' => 'cer',
        'application/pkix-crl' => 'crl',
        'application/pkix-pkipath' => 'pkipath',
        'application/pkixcmp' => 'pki',
        'application/pls+xml' => 'pls',
        'application/postscript' => 'ai',
        'application/prs.cww' => 'cww',
        'application/pskc+xml' => 'pskcxml',
        'application/rdf+xml' => 'rdf',
        'application/reginfo+xml' => 'rif',
        'application/relax-ng-compact-syntax' => 'rnc',
        'application/resource-lists+xml' => 'rl',
        'application/resource-lists-diff+xml' => 'rld',
        'application/rls-services+xml' => 'rs',
        'application/rpki-ghostbusters' => 'gbr',
        'application/rpki-manifest' => 'mft',
        'application/rpki-roa' => 'roa',
        'application/rsd+xml' => 'rsd',
        'application/rss+xml' => 'rss',
        'application/rtf' => 'rtf',
        'application/sbml+xml' => 'sbml',
        'application/scvp-cv-request' => 'scq',
        'application/scvp-cv-response' => 'scs',
        'application/scvp-vp-request' => 'spq',
        'application/scvp-vp-response' => 'spp',
        'application/sdp' => 'sdp',
        'application/set-payment-initiation' => 'setpay',
        'application/set-registration-initiation' => 'setreg',
        'application/shf+xml' => 'shf',
        'application/smil+xml' => 'smi',
        'application/sparql-query' => 'rq',
        'application/sparql-results+xml' => 'srx',
        'application/srgs' => 'gram',
        'application/srgs+xml' => 'grxml',
        'application/sru+xml' => 'sru',
        'application/ssdl+xml' => 'ssdl',
        'application/ssml+xml' => 'ssml',
        'application/tei+xml' => 'tei',
        'application/thraud+xml' => 'tfi',
        'application/timestamped-data' => 'tsd',
        'application/vnd.3gpp.pic-bw-large' => 'plb',
        'application/vnd.3gpp.pic-bw-small' => 'psb',
        'application/vnd.3gpp.pic-bw-var' => 'pvb',
        'application/vnd.3gpp2.tcap' => 'tcap',
        'application/vnd.3m.post-it-notes' => 'pwn',
        'application/vnd.accpac.simply.aso' => 'aso',
        'application/vnd.accpac.simply.imp' => 'imp',
        'application/vnd.acucobol' => 'acu',
        'application/vnd.acucorp' => 'atc',
        'application/vnd.adobe.air-application-installer-package+zip' => 'air',
        'application/vnd.adobe.formscentral.fcdt' => 'fcdt',
        'application/vnd.adobe.fxp' => 'fxp',
        'application/vnd.adobe.xdp+xml' => 'xdp',
        'application/vnd.adobe.xfdf' => 'xfdf',
        'application/vnd.ahead.space' => 'ahead',
        'application/vnd.airzip.filesecure.azf' => 'azf',
        'application/vnd.airzip.filesecure.azs' => 'azs',
        'application/vnd.amazon.ebook' => 'azw',
        'application/vnd.americandynamics.acc' => 'acc',
        'application/vnd.amiga.ami' => 'ami',
        'application/vnd.android.package-archive' => 'apk',
        'application/vnd.anser-web-certificate-issue-initiation' => 'cii',
        'application/vnd.anser-web-funds-transfer-initiation' => 'fti',
        'application/vnd.antix.game-component' => 'atx',
        'application/vnd.apple.installer+xml' => 'mpkg',
        'application/vnd.apple.mpegurl' => 'm3u8',
        'application/vnd.aristanetworks.swi' => 'swi',
        'application/vnd.astraea-software.iota' => 'iota',
        'application/vnd.audiograph' => 'aep',
        'application/vnd.blueice.multipass' => 'mpm',
        'application/vnd.bmi' => 'bmi',
        'application/vnd.businessobjects' => 'rep',
        'application/vnd.chemdraw+xml' => 'cdxml',
        'application/vnd.chipnuts.karaoke-mmd' => 'mmd',
        'application/vnd.cinderella' => 'cdy',
        'application/vnd.claymore' => 'cla',
        'application/vnd.cloanto.rp9' => 'rp9',
        'application/vnd.clonk.c4group' => 'c4g',
        'application/vnd.cluetrust.cartomobile-config' => 'c11amc',
        'application/vnd.cluetrust.cartomobile-config-pkg' => 'c11amz',
        'application/vnd.commonspace' => 'csp',
        'application/vnd.contact.cmsg' => 'cdbcmsg',
        'application/vnd.cosmocaller' => 'cmc',
        'application/vnd.crick.clicker' => 'clkx',
        'application/vnd.crick.clicker.keyboard' => 'clkk',
        'application/vnd.crick.clicker.palette' => 'clkp',
        'application/vnd.crick.clicker.template' => 'clkt',
        'application/vnd.crick.clicker.wordbank' => 'clkw',
        'application/vnd.criticaltools.wbs+xml' => 'wbs',
        'application/vnd.ctc-posml' => 'pml',
        'application/vnd.cups-ppd' => 'ppd',
        'application/vnd.curl.car' => 'car',
        'application/vnd.curl.pcurl' => 'pcurl',
        'application/vnd.dart' => 'dart',
        'application/vnd.data-vision.rdz' => 'rdz',
        'application/vnd.dece.data' => 'uvf',
        'application/vnd.dece.ttml+xml' => 'uvt',
        'application/vnd.dece.unspecified' => 'uvx',
        'application/vnd.dece.zip' => 'uvz',
        'application/vnd.denovo.fcselayout-link' => 'fe_launch',
        'application/vnd.dna' => 'dna',
        'application/vnd.dolby.mlp' => 'mlp',
        'application/vnd.dpgraph' => 'dpg',
        'application/vnd.dreamfactory' => 'dfac',
        'application/vnd.ds-keypoint' => 'kpxx',
        'application/vnd.dvb.ait' => 'ait',
        'application/vnd.dvb.service' => 'svc',
        'application/vnd.dynageo' => 'geo',
        'application/vnd.ecowin.chart' => 'mag',
        'application/vnd.enliven' => 'nml',
        'application/vnd.epson.esf' => 'esf',
        'application/vnd.epson.msf' => 'msf',
        'application/vnd.epson.quickanime' => 'qam',
        'application/vnd.epson.salt' => 'slt',
        'application/vnd.epson.ssf' => 'ssf',
        'application/vnd.eszigno3+xml' => 'es3',
        'application/vnd.ezpix-album' => 'ez2',
        'application/vnd.ezpix-package' => 'ez3',
        'application/vnd.fdf' => 'fdf',
        'application/vnd.fdsn.mseed' => 'mseed',
        'application/vnd.fdsn.seed' => 'seed',
        'application/vnd.flographit' => 'gph',
        'application/vnd.fluxtime.clip' => 'ftc',
        'application/vnd.framemaker' => 'fm',
        'application/vnd.frogans.fnc' => 'fnc',
        'application/vnd.frogans.ltf' => 'ltf',
        'application/vnd.fsc.weblaunch' => 'fsc',
        'application/vnd.fujitsu.oasys' => 'oas',
        'application/vnd.fujitsu.oasys2' => 'oa2',
        'application/vnd.fujitsu.oasys3' => 'oa3',
        'application/vnd.fujitsu.oasysgp' => 'fg5',
        'application/vnd.fujitsu.oasysprs' => 'bh2',
        'application/vnd.fujixerox.ddd' => 'ddd',
        'application/vnd.fujixerox.docuworks' => 'xdw',
        'application/vnd.fujixerox.docuworks.binder' => 'xbd',
        'application/vnd.fuzzysheet' => 'fzs',
        'application/vnd.genomatix.tuxedo' => 'txd',
        'application/vnd.geogebra.file' => 'ggb',
        'application/vnd.geogebra.tool' => 'ggt',
        'application/vnd.geometry-explorer' => 'gex',
        'application/vnd.geonext' => 'gxt',
        'application/vnd.geoplan' => 'g2w',
        'application/vnd.geospace' => 'g3w',
        'application/vnd.gmx' => 'gmx',
        'application/vnd.google-earth.kml+xml' => 'kml',
        'application/vnd.google-earth.kmz' => 'kmz',
        'application/vnd.grafeq' => 'gqf',
        'application/vnd.groove-account' => 'gac',
        'application/vnd.groove-help' => 'ghf',
        'application/vnd.groove-identity-message' => 'gim',
        'application/vnd.groove-injector' => 'grv',
        'application/vnd.groove-tool-message' => 'gtm',
        'application/vnd.groove-tool-template' => 'tpl',
        'application/vnd.groove-vcard' => 'vcg',
        'application/vnd.hal+xml' => 'hal',
        'application/vnd.handheld-entertainment+xml' => 'zmm',
        'application/vnd.hbci' => 'hbci',
        'application/vnd.hhe.lesson-player' => 'les',
        'application/vnd.hp-hpgl' => 'hpgl',
        'application/vnd.hp-hpid' => 'hpid',
        'application/vnd.hp-hps' => 'hps',
        'application/vnd.hp-jlyt' => 'jlt',
        'application/vnd.hp-pcl' => 'pcl',
        'application/vnd.hp-pclxl' => 'pclxl',
        'application/vnd.hydrostatix.sof-data' => 'sfd-hdstx',
        'application/vnd.ibm.minipay' => 'mpy',
        'application/vnd.ibm.modcap' => 'afp',
        'application/vnd.ibm.rights-management' => 'irm',
        'application/vnd.ibm.secure-container' => 'sc',
        'application/vnd.iccprofile' => 'icc',
        'application/vnd.igloader' => 'igl',
        'application/vnd.immervision-ivp' => 'ivp',
        'application/vnd.immervision-ivu' => 'ivu',
        'application/vnd.insors.igm' => 'igm',
        'application/vnd.intercon.formnet' => 'xpw',
        'application/vnd.intergeo' => 'i2g',
        'application/vnd.intu.qbo' => 'qbo',
        'application/vnd.intu.qfx' => 'qfx',
        'application/vnd.ipunplugged.rcprofile' => 'rcprofile',
        'application/vnd.irepository.package+xml' => 'irp',
        'application/vnd.is-xpr' => 'xpr',
        'application/vnd.isac.fcs' => 'fcs',
        'application/vnd.jam' => 'jam',
        'application/vnd.jcp.javame.midlet-rms' => 'rms',
        'application/vnd.jisp' => 'jisp',
        'application/vnd.joost.joda-archive' => 'joda',
        'application/vnd.kahootz' => 'ktz',
        'application/vnd.kde.karbon' => 'karbon',
        'application/vnd.kde.kchart' => 'chrt',
        'application/vnd.kde.kformula' => 'kfo',
        'application/vnd.kde.kivio' => 'flw',
        'application/vnd.kde.kontour' => 'kon',
        'application/vnd.kde.kpresenter' => 'kpr',
        'application/vnd.kde.kspread' => 'ksp',
        'application/vnd.kde.kword' => 'kwd',
        'application/vnd.kenameaapp' => 'htke',
        'application/vnd.kidspiration' => 'kia',
        'application/vnd.kinar' => 'kne',
        'application/vnd.koan' => 'skp',
        'application/vnd.kodak-descriptor' => 'sse',
        'application/vnd.las.las+xml' => 'lasxml',
        'application/vnd.llamagraphics.life-balance.desktop' => 'lbd',
        'application/vnd.llamagraphics.life-balance.exchange+xml' => 'lbe',
        'application/vnd.lotus-1-2-3' => '123',
        'application/vnd.lotus-approach' => 'apr',
        'application/vnd.lotus-freelance' => 'pre',
        'application/vnd.lotus-notes' => 'nsf',
        'application/vnd.lotus-organizer' => 'org',
        'application/vnd.lotus-screencam' => 'scm',
        'application/vnd.lotus-wordpro' => 'lwp',
        'application/vnd.macports.portpkg' => 'portpkg',
        'application/vnd.mcd' => 'mcd',
        'application/vnd.medcalcdata' => 'mc1',
        'application/vnd.mediastation.cdkey' => 'cdkey',
        'application/vnd.mfer' => 'mwf',
        'application/vnd.mfmp' => 'mfm',
        'application/vnd.micrografx.flo' => 'flo',
        'application/vnd.micrografx.igx' => 'igx',
        'application/vnd.mif' => 'mif',
        'application/vnd.mobius.daf' => 'daf',
        'application/vnd.mobius.dis' => 'dis',
        'application/vnd.mobius.mbk' => 'mbk',
        'application/vnd.mobius.mqy' => 'mqy',
        'application/vnd.mobius.msl' => 'msl',
        'application/vnd.mobius.plc' => 'plc',
        'application/vnd.mobius.txf' => 'txf',
        'application/vnd.mophun.application' => 'mpn',
        'application/vnd.mophun.certificate' => 'mpc',
        'application/vnd.mozilla.xul+xml' => 'xul',
        'application/vnd.ms-artgalry' => 'cil',
        'application/vnd.ms-cab-compressed' => 'cab',
        'application/vnd.ms-excel' => 'xls',
        'application/vnd.ms-excel.addin.macroenabled.12' => 'xlam',
        'application/vnd.ms-excel.sheet.binary.macroenabled.12' => 'xlsb',
        'application/vnd.ms-excel.sheet.macroenabled.12' => 'xlsm',
        'application/vnd.ms-excel.template.macroenabled.12' => 'xltm',
        'application/vnd.ms-fontobject' => 'eot',
        'application/vnd.ms-htmlhelp' => 'chm',
        'application/vnd.ms-ims' => 'ims',
        'application/vnd.ms-lrm' => 'lrm',
        'application/vnd.ms-officetheme' => 'thmx',
        'application/vnd.ms-pki.seccat' => 'cat',
        'application/vnd.ms-pki.stl' => 'stl',
        'application/vnd.ms-powerpoint' => 'ppt',
        'application/vnd.ms-powerpoint.addin.macroenabled.12' => 'ppam',
        'application/vnd.ms-powerpoint.presentation.macroenabled.12' => 'pptm',
        'application/vnd.ms-powerpoint.slide.macroenabled.12' => 'sldm',
        'application/vnd.ms-powerpoint.slideshow.macroenabled.12' => 'ppsm',
        'application/vnd.ms-powerpoint.template.macroenabled.12' => 'potm',
        'application/vnd.ms-project' => 'mpp',
        'application/vnd.ms-word.document.macroenabled.12' => 'docm',
        'application/vnd.ms-word.template.macroenabled.12' => 'dotm',
        'application/vnd.ms-works' => 'wps',
        'application/vnd.ms-wpl' => 'wpl',
        'application/vnd.ms-xpsdocument' => 'xps',
        'application/vnd.mseq' => 'mseq',
        'application/vnd.musician' => 'mus',
        'application/vnd.muvee.style' => 'msty',
        'application/vnd.mynfc' => 'taglet',
        'application/vnd.neurolanguage.nlu' => 'nlu',
        'application/vnd.nitf' => 'ntf',
        'application/vnd.noblenet-directory' => 'nnd',
        'application/vnd.noblenet-sealer' => 'nns',
        'application/vnd.noblenet-web' => 'nnw',
        'application/vnd.nokia.n-gage.data' => 'ngdat',
        'application/vnd.nokia.n-gage.symbian.install' => 'n-gage',
        'application/vnd.nokia.radio-preset' => 'rpst',
        'application/vnd.nokia.radio-presets' => 'rpss',
        'application/vnd.novadigm.edm' => 'edm',
        'application/vnd.novadigm.edx' => 'edx',
        'application/vnd.novadigm.ext' => 'ext',
        'application/vnd.oasis.opendocument.chart' => 'odc',
        'application/vnd.oasis.opendocument.chart-template' => 'otc',
        'application/vnd.oasis.opendocument.database' => 'odb',
        'application/vnd.oasis.opendocument.formula' => 'odf',
        'application/vnd.oasis.opendocument.formula-template' => 'odft',
        'application/vnd.oasis.opendocument.graphics' => 'odg',
        'application/vnd.oasis.opendocument.graphics-template' => 'otg',
        'application/vnd.oasis.opendocument.image' => 'odi',
        'application/vnd.oasis.opendocument.image-template' => 'oti',
        'application/vnd.oasis.opendocument.presentation' => 'odp',
        'application/vnd.oasis.opendocument.presentation-template' => 'otp',
        'application/vnd.oasis.opendocument.spreadsheet' => 'ods',
        'application/vnd.oasis.opendocument.spreadsheet-template' => 'ots',
        'application/vnd.oasis.opendocument.text' => 'odt',
        'application/vnd.oasis.opendocument.text-master' => 'odm',
        'application/vnd.oasis.opendocument.text-template' => 'ott',
        'application/vnd.oasis.opendocument.text-web' => 'oth',
        'application/vnd.olpc-sugar' => 'xo',
        'application/vnd.oma.dd2+xml' => 'dd2',
        'application/vnd.openofficeorg.extension' => 'oxt',
        'application/vnd.openxmlformats-officedocument.presentationml.presentation' => 'pptx',
        'application/vnd.openxmlformats-officedocument.presentationml.slide' => 'sldx',
        'application/vnd.openxmlformats-officedocument.presentationml.slideshow' => 'ppsx',
        'application/vnd.openxmlformats-officedocument.presentationml.template' => 'potx',
        'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' => 'xlsx',
        'application/vnd.openxmlformats-officedocument.spreadsheetml.template' => 'xltx',
        'application/vnd.openxmlformats-officedocument.wordprocessingml.document' => 'docx',
        'application/vnd.openxmlformats-officedocument.wordprocessingml.template' => 'dotx',
        'application/vnd.osgeo.mapguide.package' => 'mgp',
        'application/vnd.osgi.dp' => 'dp',
        'application/vnd.osgi.subsystem' => 'esa',
        'application/vnd.palm' => 'pdb',
        'application/vnd.pawaafile' => 'paw',
        'application/vnd.pg.format' => 'str',
        'application/vnd.pg.osasli' => 'ei6',
        'application/vnd.picsel' => 'efif',
        'application/vnd.pmi.widget' => 'wg',
        'application/vnd.pocketlearn' => 'plf',
        'application/vnd.powerbuilder6' => 'pbd',
        'application/vnd.previewsystems.box' => 'box',
        'application/vnd.proteus.magazine' => 'mgz',
        'application/vnd.publishare-delta-tree' => 'qps',
        'application/vnd.pvi.ptid1' => 'ptid',
        'application/vnd.quark.quarkxpress' => 'qxd',
        'application/vnd.realvnc.bed' => 'bed',
        'application/vnd.recordare.musicxml' => 'mxl',
        'application/vnd.recordare.musicxml+xml' => 'musicxml',
        'application/vnd.rig.cryptonote' => 'cryptonote',
        'application/vnd.rim.cod' => 'cod',
        'application/vnd.rn-realmedia' => 'rm',
        'application/vnd.rn-realmedia-vbr' => 'rmvb',
        'application/vnd.route66.link66+xml' => 'link66',
        'application/vnd.sailingtracker.track' => 'st',
        'application/vnd.seemail' => 'see',
        'application/vnd.sema' => 'sema',
        'application/vnd.semd' => 'semd',
        'application/vnd.semf' => 'semf',
        'application/vnd.shana.informed.formdata' => 'ifm',
        'application/vnd.shana.informed.formtemplate' => 'itp',
        'application/vnd.shana.informed.interchange' => 'iif',
        'application/vnd.shana.informed.package' => 'ipk',
        'application/vnd.simtech-mindmapper' => 'twd',
        'application/vnd.smaf' => 'mmf',
        'application/vnd.smart.teacher' => 'teacher',
        'application/vnd.solent.sdkm+xml' => 'sdkm',
        'application/vnd.spotfire.dxp' => 'dxp',
        'application/vnd.spotfire.sfs' => 'sfs',
        'application/vnd.stardivision.calc' => 'sdc',
        'application/vnd.stardivision.draw' => 'sda',
        'application/vnd.stardivision.impress' => 'sdd',
        'application/vnd.stardivision.math' => 'smf',
        'application/vnd.stardivision.writer' => 'sdw',
        'application/vnd.stardivision.writer-global' => 'sgl',
        'application/vnd.stepmania.package' => 'smzip',
        'application/vnd.stepmania.stepchart' => 'sm',
        'application/vnd.sun.xml.calc' => 'sxc',
        'application/vnd.sun.xml.calc.template' => 'stc',
        'application/vnd.sun.xml.draw' => 'sxd',
        'application/vnd.sun.xml.draw.template' => 'std',
        'application/vnd.sun.xml.impress' => 'sxi',
        'application/vnd.sun.xml.impress.template' => 'sti',
        'application/vnd.sun.xml.math' => 'sxm',
        'application/vnd.sun.xml.writer' => 'sxw',
        'application/vnd.sun.xml.writer.global' => 'sxg',
        'application/vnd.sun.xml.writer.template' => 'stw',
        'application/vnd.sus-calendar' => 'sus',
        'application/vnd.svd' => 'svd',
        'application/vnd.symbian.install' => 'sis',
        'application/vnd.syncml+xml' => 'xsm',
        'application/vnd.syncml.dm+wbxml' => 'bdm',
        'application/vnd.syncml.dm+xml' => 'xdm',
        'application/vnd.tao.intent-module-archive' => 'tao',
        'application/vnd.tcpdump.pcap' => 'pcap',
        'application/vnd.tmobile-livetv' => 'tmo',
        'application/vnd.trid.tpt' => 'tpt',
        'application/vnd.triscape.mxs' => 'mxs',
        'application/vnd.trueapp' => 'tra',
        'application/vnd.ufdl' => 'ufd',
        'application/vnd.uiq.theme' => 'utz',
        'application/vnd.umajin' => 'umj',
        'application/vnd.unity' => 'unityweb',
        'application/vnd.uoml+xml' => 'uoml',
        'application/vnd.vcx' => 'vcx',
        'application/vnd.visio' => 'vsd',
        'application/vnd.visionary' => 'vis',
        'application/vnd.vsf' => 'vsf',
        'application/vnd.wap.wbxml' => 'wbxml',
        'application/vnd.wap.wmlc' => 'wmlc',
        'application/vnd.wap.wmlscriptc' => 'wmlsc',
        'application/vnd.webturbo' => 'wtb',
        'application/vnd.wolfram.player' => 'nbp',
        'application/vnd.wordperfect' => 'wpd',
        'application/vnd.wqd' => 'wqd',
        'application/vnd.wt.stf' => 'stf',
        'application/vnd.xara' => 'xar',
        'application/vnd.xfdl' => 'xfdl',
        'application/vnd.yamaha.hv-dic' => 'hvd',
        'application/vnd.yamaha.hv-script' => 'hvs',
        'application/vnd.yamaha.hv-voice' => 'hvp',
        'application/vnd.yamaha.openscoreformat' => 'osf',
        'application/vnd.yamaha.openscoreformat.osfpvg+xml' => 'osfpvg',
        'application/vnd.yamaha.smaf-audio' => 'saf',
        'application/vnd.yamaha.smaf-phrase' => 'spf',
        'application/vnd.yellowriver-custom-menu' => 'cmp',
        'application/vnd.zul' => 'zir',
        'application/vnd.zzazz.deck+xml' => 'zaz',
        'application/voicexml+xml' => 'vxml',
        'application/widget' => 'wgt',
        'application/winhlp' => 'hlp',
        'application/wsdl+xml' => 'wsdl',
        'application/wspolicy+xml' => 'wspolicy',
        'application/x-7z-compressed' => '7z',
        'application/x-abiword' => 'abw',
        'application/x-ace-compressed' => 'ace',
        'application/x-apple-diskimage' => 'dmg',
        'application/x-authorware-bin' => 'aab',
        'application/x-authorware-map' => 'aam',
        'application/x-authorware-seg' => 'aas',
        'application/x-bcpio' => 'bcpio',
        'application/x-bittorrent' => 'torrent',
        'application/x-blorb' => 'blb',
        'application/x-bzip' => 'bz',
        'application/x-bzip2' => 'bz2',
        'application/x-cbr' => 'cbr',
        'application/x-cdlink' => 'vcd',
        'application/x-cfs-compressed' => 'cfs',
        'application/x-chat' => 'chat',
        'application/x-chess-pgn' => 'pgn',
        'application/x-conference' => 'nsc',
        'application/x-cpio' => 'cpio',
        'application/x-csh' => 'csh',
        'application/x-debian-package' => 'deb',
        'application/x-dgc-compressed' => 'dgc',
        'application/x-director' => 'dir',
        'application/x-doom' => 'wad',
        'application/x-dtbncx+xml' => 'ncx',
        'application/x-dtbook+xml' => 'dtb',
        'application/x-dtbresource+xml' => 'res',
        'application/x-dvi' => 'dvi',
        'application/x-envoy' => 'evy',
        'application/x-eva' => 'eva',
        'application/x-font-bdf' => 'bdf',
        'application/x-font-ghostscript' => 'gsf',
        'application/x-font-linux-psf' => 'psf',
        'application/x-font-otf' => 'otf',
        'application/x-font-pcf' => 'pcf',
        'application/x-font-snf' => 'snf',
        'application/x-font-ttf' => 'ttf',
        'application/x-font-type1' => 'pfa',
        'application/x-font-woff' => 'woff',
        'application/x-freearc' => 'arc',
        'application/x-futuresplash' => 'spl',
        'application/x-gca-compressed' => 'gca',
        'application/x-glulx' => 'ulx',
        'application/x-gnumeric' => 'gnumeric',
        'application/x-gramps-xml' => 'gramps',
        'application/x-gtar' => 'gtar',
        'application/x-hdf' => 'hdf',
        'application/x-install-instructions' => 'install',
        'application/x-iso9660-image' => 'iso',
        'application/x-java-jnlp-file' => 'jnlp',
        'application/x-latex' => 'latex',
        'application/x-lzh-compressed' => 'lzh',
        'application/x-mie' => 'mie',
        'application/x-mobipocket-ebook' => 'prc',
        'application/x-ms-application' => 'application',
        'application/x-ms-shortcut' => 'lnk',
        'application/x-ms-wmd' => 'wmd',
        'application/x-ms-wmz' => 'wmz',
        'application/x-ms-xbap' => 'xbap',
        'application/x-msaccess' => 'mdb',
        'application/x-msbinder' => 'obd',
        'application/x-mscardfile' => 'crd',
        'application/x-msclip' => 'clp',
        'application/x-msdownload' => 'exe',
        'application/x-msmediaview' => 'mvb',
        'application/x-msmetafile' => 'wmf',
        'application/x-msmoney' => 'mny',
        'application/x-mspublisher' => 'pub',
        'application/x-msschedule' => 'scd',
        'application/x-msterminal' => 'trm',
        'application/x-mswrite' => 'wri',
        'application/x-netcdf' => 'nc',
        'application/x-nzb' => 'nzb',
        'application/x-pkcs12' => 'p12',
        'application/x-pkcs7-certificates' => 'p7b',
        'application/x-pkcs7-certreqresp' => 'p7r',
        'application/x-rar-compressed' => 'rar',
        'application/x-rar' => 'rar',
        'application/x-research-info-systems' => 'ris',
        'application/x-sh' => 'sh',
        'application/x-shar' => 'shar',
        'application/x-shockwave-flash' => 'swf',
        'application/x-silverlight-app' => 'xap',
        'application/x-sql' => 'sql',
        'application/x-stuffit' => 'sit',
        'application/x-stuffitx' => 'sitx',
        'application/x-subrip' => 'srt',
        'application/x-sv4cpio' => 'sv4cpio',
        'application/x-sv4crc' => 'sv4crc',
        'application/x-t3vm-image' => 't3',
        'application/x-tads' => 'gam',
        'application/x-tar' => 'tar',
        'application/x-tcl' => 'tcl',
        'application/x-tex' => 'tex',
        'application/x-tex-tfm' => 'tfm',
        'application/x-texinfo' => 'texinfo',
        'application/x-tgif' => 'obj',
        'application/x-ustar' => 'ustar',
        'application/x-wais-source' => 'src',
        'application/x-x509-ca-cert' => 'der',
        'application/x-xfig' => 'fig',
        'application/x-xliff+xml' => 'xlf',
        'application/x-xpinstall' => 'xpi',
        'application/x-xz' => 'xz',
        'application/x-zmachine' => 'z1',
        'application/xaml+xml' => 'xaml',
        'application/xcap-diff+xml' => 'xdf',
        'application/xenc+xml' => 'xenc',
        'application/xhtml+xml' => 'xhtml',
        'application/xml' => 'xml',
        'application/xml-dtd' => 'dtd',
        'application/xop+xml' => 'xop',
        'application/xproc+xml' => 'xpl',
        'application/xslt+xml' => 'xslt',
        'application/xspf+xml' => 'xspf',
        'application/xv+xml' => 'mxml',
        'application/yang' => 'yang',
        'application/yin+xml' => 'yin',
        'application/zip' => 'zip',
        'audio/adpcm' => 'adp',
        'audio/basic' => 'au',
        'audio/midi' => 'mid',
        'audio/mp4' => 'mp4a',
        'audio/mpeg' => 'mpga',
        'audio/ogg' => 'oga',
        'audio/s3m' => 's3m',
        'audio/silk' => 'sil',
        'audio/vnd.dece.audio' => 'uva',
        'audio/vnd.digital-winds' => 'eol',
        'audio/vnd.dra' => 'dra',
        'audio/vnd.dts' => 'dts',
        'audio/vnd.dts.hd' => 'dtshd',
        'audio/vnd.lucent.voice' => 'lvp',
        'audio/vnd.ms-playready.media.pya' => 'pya',
        'audio/vnd.nuera.ecelp4800' => 'ecelp4800',
        'audio/vnd.nuera.ecelp7470' => 'ecelp7470',
        'audio/vnd.nuera.ecelp9600' => 'ecelp9600',
        'audio/vnd.rip' => 'rip',
        'audio/webm' => 'weba',
        'audio/x-aac' => 'aac',
        'audio/x-aiff' => 'aif',
        'audio/x-caf' => 'caf',
        'audio/x-flac' => 'flac',
        'audio/x-matroska' => 'mka',
        'audio/x-mpegurl' => 'm3u',
        'audio/x-ms-wax' => 'wax',
        'audio/x-ms-wma' => 'wma',
        'audio/x-pn-realaudio' => 'ram',
        'audio/x-pn-realaudio-plugin' => 'rmp',
        'audio/x-wav' => 'wav',
        'audio/xm' => 'xm',
        'chemical/x-cdx' => 'cdx',
        'chemical/x-cif' => 'cif',
        'chemical/x-cmdf' => 'cmdf',
        'chemical/x-cml' => 'cml',
        'chemical/x-csml' => 'csml',
        'chemical/x-xyz' => 'xyz',
        'image/bmp' => 'bmp',
        'image/x-ms-bmp' => 'bmp',
        'image/cgm' => 'cgm',
        'image/g3fax' => 'g3',
        'image/gif' => 'gif',
        'image/ief' => 'ief',
        'image/jpeg' => 'jpg',
        'image/pjpeg' => 'jpeg',
        'image/ktx' => 'ktx',
        'image/png' => 'png',
        'image/prs.btif' => 'btif',
        'image/sgi' => 'sgi',
        'image/svg+xml' => 'svg',
        'image/tiff' => 'tiff',
        'image/vnd.adobe.photoshop' => 'psd',
        'image/vnd.dece.graphic' => 'uvi',
        'image/vnd.dvb.subtitle' => 'sub',
        'image/vnd.djvu' => 'djvu',
        'image/vnd.dwg' => 'dwg',
        'image/vnd.dxf' => 'dxf',
        'image/vnd.fastbidsheet' => 'fbs',
        'image/vnd.fpx' => 'fpx',
        'image/vnd.fst' => 'fst',
        'image/vnd.fujixerox.edmics-mmr' => 'mmr',
        'image/vnd.fujixerox.edmics-rlc' => 'rlc',
        'image/vnd.ms-modi' => 'mdi',
        'image/vnd.ms-photo' => 'wdp',
        'image/vnd.net-fpx' => 'npx',
        'image/vnd.wap.wbmp' => 'wbmp',
        'image/vnd.xiff' => 'xif',
        'image/webp' => 'webp',
        'image/x-3ds' => '3ds',
        'image/x-cmu-raster' => 'ras',
        'image/x-cmx' => 'cmx',
        'image/x-freehand' => 'fh',
        'image/x-icon' => 'ico',
        'image/x-mrsid-image' => 'sid',
        'image/x-pcx' => 'pcx',
        'image/x-pict' => 'pic',
        'image/x-portable-anymap' => 'pnm',
        'image/x-portable-bitmap' => 'pbm',
        'image/x-portable-graymap' => 'pgm',
        'image/x-portable-pixmap' => 'ppm',
        'image/x-rgb' => 'rgb',
        'image/x-tga' => 'tga',
        'image/x-xbitmap' => 'xbm',
        'image/x-xpixmap' => 'xpm',
        'image/x-xwindowdump' => 'xwd',
        'message/rfc822' => 'eml',
        'model/iges' => 'igs',
        'model/mesh' => 'msh',
        'model/vnd.collada+xml' => 'dae',
        'model/vnd.dwf' => 'dwf',
        'model/vnd.gdl' => 'gdl',
        'model/vnd.gtw' => 'gtw',
        'model/vnd.mts' => 'mts',
        'model/vnd.vtu' => 'vtu',
        'model/vrml' => 'wrl',
        'model/x3d+binary' => 'x3db',
        'model/x3d+vrml' => 'x3dv',
        'model/x3d+xml' => 'x3d',
        'text/cache-manifest' => 'appcache',
        'text/calendar' => 'ics',
        'text/css' => 'css',
        'text/csv' => 'csv',
        'text/html' => 'html',
        'text/n3' => 'n3',
        'text/plain' => 'txt',
        'text/prs.lines.tag' => 'dsc',
        'text/richtext' => 'rtx',
        'text/rtf' => 'rtf',
        'text/sgml' => 'sgml',
        'text/tab-separated-values' => 'tsv',
        'text/troff' => 't',
        'text/turtle' => 'ttl',
        'text/uri-list' => 'uri',
        'text/vcard' => 'vcard',
        'text/vnd.curl' => 'curl',
        'text/vnd.curl.dcurl' => 'dcurl',
        'text/vnd.curl.scurl' => 'scurl',
        'text/vnd.curl.mcurl' => 'mcurl',
        'text/vnd.dvb.subtitle' => 'sub',
        'text/vnd.fly' => 'fly',
        'text/vnd.fmi.flexstor' => 'flx',
        'text/vnd.graphviz' => 'gv',
        'text/vnd.in3d.3dml' => '3dml',
        'text/vnd.in3d.spot' => 'spot',
        'text/vnd.sun.j2me.app-descriptor' => 'jad',
        'text/vnd.wap.wml' => 'wml',
        'text/vnd.wap.wmlscript' => 'wmls',
        'text/x-asm' => 's',
        'text/x-c' => 'c',
        'text/x-fortran' => 'f',
        'text/x-pascal' => 'p',
        'text/x-java-source' => 'java',
        'text/x-opml' => 'opml',
        'text/x-nfo' => 'nfo',
        'text/x-setext' => 'etx',
        'text/x-sfv' => 'sfv',
        'text/x-uuencode' => 'uu',
        'text/x-vcalendar' => 'vcs',
        'text/x-vcard' => 'vcf',
        'video/3gpp' => '3gp',
        'video/3gpp2' => '3g2',
        'video/h261' => 'h261',
        'video/h263' => 'h263',
        'video/h264' => 'h264',
        'video/jpeg' => 'jpgv',
        'video/jpm' => 'jpm',
        'video/mj2' => 'mj2',
        'video/mp4' => 'mp4',
        'video/mpeg' => 'mpeg',
        'video/ogg' => 'ogv',
        'video/quicktime' => 'qt',
        'video/vnd.dece.hd' => 'uvh',
        'video/vnd.dece.mobile' => 'uvm',
        'video/vnd.dece.pd' => 'uvp',
        'video/vnd.dece.sd' => 'uvs',
        'video/vnd.dece.video' => 'uvv',
        'video/vnd.dvb.file' => 'dvb',
        'video/vnd.fvt' => 'fvt',
        'video/vnd.mpegurl' => 'mxu',
        'video/vnd.ms-playready.media.pyv' => 'pyv',
        'video/vnd.uvvu.mp4' => 'uvu',
        'video/vnd.vivo' => 'viv',
        'video/webm' => 'webm',
        'video/x-f4v' => 'f4v',
        'video/x-fli' => 'fli',
        'video/x-flv' => 'flv',
        'video/x-m4v' => 'm4v',
        'video/x-matroska' => 'mkv',
        'video/x-mng' => 'mng',
        'video/x-ms-asf' => 'asf',
        'video/x-ms-vob' => 'vob',
        'video/x-ms-wm' => 'wm',
        'video/x-ms-wmv' => 'wmv',
        'video/x-ms-wmx' => 'wmx',
        'video/x-ms-wvx' => 'wvx',
        'video/x-msvideo' => 'avi',
        'video/x-sgi-movie' => 'movie',
        'video/x-smv' => 'smv',
        'x-conference/x-cooltalk' => 'ice',
    ];

    const TEMP_DIR                  = './temp/';

    const EXIF_IMAGETYPE = [
        IMAGETYPE_GIF, IMAGETYPE_JPEG, IMAGETYPE_PNG,
        IMAGETYPE_SWF, IMAGETYPE_PSD, IMAGETYPE_BMP,
        IMAGETYPE_TIFF_II, IMAGETYPE_TIFF_MM, IMAGETYPE_JPC,
        IMAGETYPE_JP2, IMAGETYPE_JPX, IMAGETYPE_JB2,
        IMAGETYPE_SWC, IMAGETYPE_IFF, IMAGETYPE_WBMP,
        IMAGETYPE_XBM, IMAGETYPE_ICO, IMAGETYPE_WEBP,
    ];

    private $mimeDatabase;
    private $proceedOnTemp = false;

    /**
     * The input source file
     *
     * @var string
     */
    private $source;

    /**
     * The source used to proceed the parsing
     *
     * @var string
     */
    private $base;
    private $basename;

    /**
     * The filename before the extension
     *
     * @var string
     */
    private $filename;

    /**
     * The file extension
     *
     * @var string
     */
    private $extension;

    /**
     * MIME Type
     *
     * @var string
     */
    private $mimetype;
    private $mimetypeExtension;

    /**
     * Media Type
     *
     * @var string
     */
    private $filetype;
    // TODO: private $type;
    // TODO: private $file;
    // TODO: private $dir;
    // TODO: private $link;

    /**
     * File size
     *
     * @var int
     */
    private $size;

    /**
     * File header
     *
     * @var string
     */
    private $header;

    /**
     * File data content
     *
     * @var string
     */
    private $content;

    /**
     * Rows of content
     *
     * @var int
     */
    private $rows;

    /**
     * Hash MD5 of the content
     *
     * @var string
     */
    private $md5;

    /**
     * Hash SHA1 of the content
     *
     * @var string
     */
    private $sha1;

    /**
     * Base62 of the content
     *
     * @var string
     */
    private $base64;

    /**
     * Base64 prefixed by MimeType
     *
     * @var string
     */
    private $data64;

    /**
     * File description
     *
     * @var string
     */
    private $description;

    /**
     * Image Thumbnail
     *
     * @var string|false
     */
    private $thumbnail;

    /**
     * Image EXIF
     *
     * @var array
     */
    private $exif;

    /**
     * Image Sizes
     *
     * @var array
     */
    private $imageSizes;

    /**
     * Image Sizes
     *
     * @var int
     */
    private $width;
    private $height;
    private $bits;
    private $channels;
    private $orientation;

    private $id3Tags;


    // = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = =


    public function __construct(string $source)
    {
        // Import MIME Type database
        $this->mimeDatabase = require __DIR__.self::DATABASE;

        // Set the source file
        $this->source = $source;

        // If source file don't exist, make it local temporary
        file_exists($this->source)
            ? $this->setBase($this->source)
            : $this->copyToLocalTemp();

        if ($this->isValidFile())
        {
            // File Info
            $this->setFilename();
            $this->setExtension();
            $this->setMimetype();
            $this->setMimetypeExtension();
            $this->setFiletype();
            $this->setSize();
            $this->setDescription();
            $this->setStat();
            $this->setType();

            // File content;
            $this->setHeader();
            $this->setContent();
            $this->setMd5();
            $this->setSha1();
            $this->setBase64();

            switch ($this->type)
            {
                case 'image':
                    $this->setThumbnail();
                    $this->setExif();
                    $this->setImageSizes();
                    $this->setOrientation();
                    break;

                case 'audio':
                    $this->setId3Tags();
                    break;
            }
        }
    }

    public function __destruct()
    {
        if ($this->proceedOnTemp && file_exists($this->base))
        {
            unlink($this->base);
        }
    }


    // = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = =

    public function get($options = null)
    {
        $info = $this->info();
        if (isset($info[$options])) return $info[$options];

        $content = $this->content();
        if (isset($content[$options])) return $content[$options];

        $image = $this->image();
        if (isset($image[$options])) return $image[$options];

        return null;
    }

    public function info($options = null)
    {
        $data = array(
            self::INFO_RELPATH          => $this->source,
            self::INFO_ABSPATH          => $this->base,
            self::INFO_BASENAME         => $this->basename,
            self::INFO_FILENAME         => $this->filename,
            self::INFO_EXTENSION        => $this->extension,
            self::INFO_MIMETYPE         => $this->mimetype,
            self::INFO_MIMETYPE_EXTENSION => $this->mimetypeExtension,
            self::INFO_FILETYPE         => $this->filetype,
            self::INFO_TYPE             => $this->type,
            self::INFO_SIZE             => $this->size,
            self::INFO_DESCRIPTION      => $this->description,
            // "stat"              => $this->stat,
        );

        return (isset($data[$options]))
            ? $data[$options]
            : $data;
    }

    public function content($options = null)
    {
        $data = array(
            self::CONTENT_HEADER        => $this->header,
            self::CONTENT_DATA          => $this->content,
            self::CONTENT_BASE64        => $this->base64,
            self::CONTENT_DATA64        => $this->data64,
            self::CONTENT_MD5           => $this->md5,
            self::CONTENT_SHA1          => $this->sha1,
            self::CONTENT_ROWS          => $this->rows,
        );

        return (isset($data[$options]))
            ? $data[$options]
            : $data;
    }

    public function image($options = null)
    {
        $data = array(
            self::IMAGE_THUMBNAIL       => $this->thumbnail,
            self::IMAGE_WIDTH           => $this->width,
            self::IMAGE_HEIGHT          => $this->height,
            self::IMAGE_ORIENTATION     => $this->orientation,
            self::IMAGE_BITS            => $this->bits,
            self::IMAGE_CHANNELS        => $this->channels,
            self::IMAGE_EXIF            => $this->exif,
        );

        return (isset($data[$options]))
            ? $data[$options]
            : $data;
    }

    public function audio($options = null)
    {
        $data = array(
            "id3Tags"   => $this->id3Tags,
        );

        return (isset($data[$options]))
            ? $data[$options]
            : $data;
    }


    // = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = =


    private function copyToLocalTemp()
    {
        // Retrieve the basename of the source
        // $basename = \pathinfo($this->source, PATHINFO_BASENAME);
        $this->setBasename( $this->source );

        // Define the temporary destination
        $destination = self::TEMP_DIR.$this->basename;

        // Create temporary directory if don't exist
        if (!\file_exists(self::TEMP_DIR) || !\is_dir(self::TEMP_DIR))
        {
            \mkdir(self::TEMP_DIR);
        }

        // Copy the source to the temporary directory
        copy($this->source, $destination);

        // Set $destination has base
        $this->setBase( $destination );

        $this->proceedOnTemp = true;

        return $this;
    }

    private function isValidFile()
    {
        $filetype = \filetype( $this->base );
        $isFile = is_file( $this->base );

        return $filetype === 'file' && $isFile;
    }

    private function getMimeDatabase($mimetype = null)
    {
        if (isset($this->mimeDatabase[$mimetype]))
        {
            return $this->mimeDatabase[$mimetype];
        }

        return $this->mimeDatabase;
    }

    public function boundary()
    {
        $x = "==========";

        return $x.\md5(\uniqid()).$x;
    }


    // = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = =


    /**
     * Base to proceed to parsing
     */
    private function getBase()
    {
        return $this->base;
    }
    private function setBase($base)
    {
        $this->base = \realpath($base);
        $this->setBasename( $this->base );

        return $this;
    }

    /**
     * Get the value of basename
     */
    private function getBasename()
    {
        return $this->basename;
    }
    private function setBasename(string $file)
    {
        $this->basename = \pathinfo($file, PATHINFO_BASENAME);

        return $this;
    }

    /**
     * Filename
     *
     * The name of file before the extension
     */
    private function getFilename()
    {
        return $this->filename;
    }
    private function setFilename()
    {
        $this->filename = \pathinfo($this->base, PATHINFO_FILENAME);

        return $this;
    }

    /**
     * Extension
     *
     * The file extension
     */
    private function getExtension()
    {
        return $this->extension;
    }
    private function setExtension()
    {
        $this->extension = \pathinfo($this->base, PATHINFO_EXTENSION);

        return $this;
    }

    /**
     * File content MimeType
     */
    private function getMimetype()
    {
        return $this->mimetype;
    }
    private function setMimetype()
    {
        $this->mimetype = \mime_content_type( $this->base );

        return $this;
    }

    /**
     * Extension provide by MimeType
     */
    private function getMimetypeExtension()
    {
        return $this->mimetypeExtension;
    }
    private function setMimetypeExtension()
    {
        $this->mimetypeExtension = $this->getMimeDatabase( $this->mimetype );

        return $this;
    }

    /**
     * Media Filetype
     */
    private function getFiletype()
    {
        return $this->filetype;
    }
    private function setFiletype()
    {
        $filetype = explode("/", $this->mimetype);
        $this->filetype = $filetype[0];

        return $this;
    }

    /**
     * Get the value of type
     */
    // public function getType()
    // {
    //     return $this->type;
    // }
    // public function setType()
    // {
    //     $this->type = $type;

    //     return $this;
    // }

    /**
     * File Stat
     */
    private function getStat()
    {
        return $this->stat;
    }
    private function setStat()
    {
        // 0	dev	volume
        // 1	ino	Numéro d'inode (*)
        // 2	mode	droit d'accès à l'inode
        // 3	nlink	nombre de liens
        // 4	uid	userid du propriétaire (*)
        // 5	gid	groupid du propriétaire (*)
        // 6	rdev	type du volume, si le volume est une inode
        // 8	atime	date de dernier accès (Unix timestamp)
        // 9	mtime	date de dernière modification (Unix timestamp)
        // 10	ctime	date de dernier changement d'inode (Unix timestamp)
        // 11	blksize	taille de bloc (**)
        // 12	blocks	nombre de blocs de 512 octets alloués (**)
        $this->stat = \stat( $this->base );

        return $this;
    }

    /**
     * File size
     */
    private function getSize()
    {
        return $this->size;
    }
    private function setSize()
    {
        $this->size = \filesize( $this->base );

        return $this;
    }

    /**
     * Get file header
     */
    private function getHeader()
    {
        return $this->header;
    }
    private function setHeader()
    {
        $boundary = $this->boundary();

        $file = file($this->base);

        $header = $file[0];
        $header = explode("\n", $header);
        $header = preg_replace('/[\x00-\x1F\x7F-\xFF]/', $boundary, $header[0]);
        $header = explode($boundary, $header);

        foreach ($header as $key => $value)
        {
            if (empty(trim($value)))
            {
                unset($header[$key]);
            }
            else
            {
                $header[$key] = trim($value);
            }
        }

        $header = implode(' ', $header);

        $this->header = $header;

        $this->setRows( count($file) );

        return $this;
    }

    /**
     * File content
     */
    private function getContent()
    {
        return $this->content;
    }
    private function setContent()
    {

        // $handle = fopen($this->base, 'r');
        // $this->content = fread($handle, filesize($this->base) );
        // fclose($handle);

        $this->content = \file_get_contents( $this->base );

        return $this;
    }

    /**
     * Rows of content
     */
    public function getRows()
    {
        return $this->rows;
    }
    public function setRows(int $rows)
    {
        $this->rows = $rows;

        return $this;
    }

    /**
     * Hash MD5 of the content
     */
    private function getMd5()
    {
        return $this->md5;
    }
    private function setMd5()
    {
        $this->md5 = \md5( $this->content );

        return $this;
    }

    /**
     * Hash SHA1 of the content
     */
    private function getSha1()
    {
        return $this->sha1;
    }
    private function setSha1()
    {
        $this->sha1 = \sha1( $this->content );

        return $this;
    }

    /**
     * Base62 of the content
     */
    private function getBase64()
    {
        return $this->base64;
    }
    private function getData64()
    {
        return $this->data64;
    }
    private function setBase64()
    {
        $this->base64 = base64_encode( $this->content );
        $this->data64 = "data:".$this->mimetype.";base64,".$this->base64;

        return $this;
    }

    /**
     * File description
     */
    private function getDescription()
    {
        return $this->description;
    }
    private function setDescription()
    {
        if (\function_exists('finfo_open') && \function_exists('finfo_file') && \function_exists('finfo_close'))
        {
            $finfo = finfo_open();
            $description = \finfo_file($finfo, $this->base);
            \finfo_close($finfo);
        }

        $this->description = $description;

        return $this;
    }

    /**
     * Image Thumbnail
     */
    private function getThumbnail()
    {
        return $this->thumbnail;
    }
    private function setThumbnail()
    {
        if ($this->type == "image")
        {
            if (($thumbnail = @\exif_thumbnail( $this->base )) !== false)
            {
                $this->thumbnail = $thumbnail;
            }
        }

        return $this;
    }

    /**
     * Image EXIF
     */
    private function getExif()
    {
        return $this->exif;
    }
    private function setExif()
    {
        // foreach (self::EXIF_IMAGETYPE as $imagetype)
        // {
        //     $exif_mimetype = image_type_to_mime_type( $imagetype );
        //     if ($exif_mimetype === $this->mimetype)
        //     {
        //         $this->exif = \exif_read_data( $this->base );
        //         continue;
        //     }
        // }

        // if ($this->mimetype === "image/jpeg")
        // {
        //     $this->exif = \exif_read_data( $this->base );
        // }

        if ($this->type == "image")
        {
            if (($exif = @\exif_read_data( $this->base )) !== false)
            {
                $this->exif = $exif;
            }
        }

        return $this;
    }

    /**
     * Image Sizes
     */
    private function getImageSizes()
    {
        return $this->imageSizes;
    }
    private function setImageSizes()
    {
        if (\function_exists('getimagesize') && $this->type == "image")
        {
            $this->imageSizes = \getimagesize( $this->base );

            $this->width    = isset($this->imageSizes[0])           ? $this->imageSizes[0] : null;
            $this->height   = isset($this->imageSizes[1])           ? $this->imageSizes[1] : null;
            $this->bits     = isset($this->imageSizes['bits'])      ? $this->imageSizes['bits'] : null;
            $this->channels = isset($this->imageSizes['channels'])  ? $this->imageSizes['channels'] : null;
        }

        return $this;
    }

    /**
     * Get the value of orientation
     */
    private function getOrientation()
    {
        return $this->orientation;
    }

    private function setOrientation()
    {
        if ($this->width > $this->height)
        {
            $orientation = "landscape";
        }
        else if ($this->width < $this->height)
        {
            $orientation = "protrait";
        }
        else
        {
            $orientation = "square";
        }

        $this->orientation = $orientation;

        return $this;
    }

    /**
     * ID3 Tags
     */
    private function getId3Tags()
    {
        return $this->id3Tags;
    }
    private function setId3Tags()
    {
        if (\function_exists('id3_get_tag') && $this->type == "audio")
        {
            $this->id3Tags = \id3_get_tag( $this->base );
        }

        return $this;
    }


















    /**
     * @return FileInfo
     */
    function getFile(){
        return new FileInfo();
    }

    /**
     * @param $link
     * @return bool
     */
    function isRemoteFile($link){
        $finfo = new FileInfo();
        return !$finfo->get($link) ? false : true;
    }

    /**
     * @param $link
     * @return bool
     */
    function isRemoteFileImage($link){
        $finfo = new FileInfo();
        return !$finfo->isImage($link) ? false : true;
    }

    /**
     * @param $link
     * @return array
     */
    function remoteFileInfo($link){
        $finfo = new FileInfo();
        return $finfo->get($link);
    }
}
