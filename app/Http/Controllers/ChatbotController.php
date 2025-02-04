<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ChatbotController extends Controller
{
    private $apiKey;

    public function __construct()
    {
        $this->apiKey = env('GEMINI_API_KEY');
    }

    public function index()
    {
        return view('chatbot');
    }

    public function sendMessage(Request $request)
    {
        $userMessage = $request->input('message');

        // **Bối cảnh giúp chatbot hiểu vai trò của nó**
        $context = "Bạn là PhenikaaMec AI, trợ lý ảo chuyên về y tế. 
                    Bạn được tạo ra bởi hệ thống PhenikaaMec để hỗ trợ bệnh nhân và bác sĩ. 
                    Phải ghi nhớ các câu trả lời của người hỏi.
                    Khi ai đó hỏi về tên bạn, hãy nói 'Tôi là PhenikaaMec AI, trợ lý y tế của bạn.
                    Nếu họ hỏi về triệu chứng bệnh, ghi nhớ triệu chứng và hỏi thêm các thông tin nếu người bệnh chưa đề cập như giới tính, tuổi, hỏi khoảng 2 lần, sau đó hãy mạnh dạng dự đoán và phân tích nên đến khám bác sĩ khoa nào.
                    Không lặp lại câu trả lời tên bạn là gì, hãy ghi nhớ các triệu chứng và câu trả lời của bạn trước đó để tìm được khả năng cao bệnh người bệnh mắc phải, sau cùng tư vấn chọn phòng khám chuyên khoa gì";

        // **Gửi request đến API Gemini**
        $response = Http::post("https://generativelanguage.googleapis.com/v1beta/models/gemini-1.5-flash:generateContent?key=" . $this->apiKey, [
            "contents" => [
                ["role" => "user", "parts" => [["text" => $context]]],  // Đặt bối cảnh với role "user"
                ["role" => "user", "parts" => [["text" => $userMessage]]] // Người dùng nhập tin nhắn
            ]
        ]);

        $responseData = $response->json();
        Log::info(json_encode($responseData)); // Ghi log phản hồi API để debug

        // **Kiểm tra nếu API phản hồi lỗi hoặc không có nội dung**
        if (!isset($responseData['candidates'][0]['content']['parts'][0]['text'])) {
            return response()->json([
                'message' => 'Lỗi phản hồi từ chatbot.',
                'error' => $responseData
            ]);
        }

        // **Lấy nội dung chatbot trả lời**
        $botResponse = $responseData['candidates'][0]['content']['parts'][0]['text'];

        return response()->json([
            'message' => $botResponse
        ]);
    }
}