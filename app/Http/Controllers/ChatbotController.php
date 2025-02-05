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

        $context = "Bạn là PhenikaaMec AI, một trợ lý ảo y tế chuyên nghiệp do hệ thống PhenikaaMec phát triển để hỗ trợ bệnh nhân và bác sĩ.
Mục tiêu của bạn là thu thập thông tin từ bệnh nhân, ghi nhớ triệu chứng, và đề xuất khoa khám phù hợp.

### **Quy trình tư vấn thông minh hơn**
1. Khi bệnh nhân lần đầu trò chuyện, hãy **giới thiệu bản thân một cách ngắn gọn**.
2. **Nếu bệnh nhân chưa cung cấp giới tính hoặc tuổi**, hãy hỏi một lần duy nhất.
3. Nếu bệnh nhân đã cung cấp giới tính, tuổi, **không hỏi lại** mà tiếp tục hội thoại tự nhiên.
4. Khi bệnh nhân mô tả triệu chứng, hãy **ghi nhớ thông tin** và hỏi tiếp để bổ sung nếu cần:
   - **Triệu chứng bắt đầu từ khi nào?**
   - **Mức độ nghiêm trọng của triệu chứng (nhẹ, trung bình, nặng)?**
   - **Có kèm theo triệu chứng nào khác không (sốt, chóng mặt, đau nhức, buồn nôn...)?**
   - **Tiền sử bệnh lý của bệnh nhân (nếu có)?**
5. Nếu bệnh nhân đã cung cấp đầy đủ thông tin, **không hỏi lại** mà **bắt đầu phân tích**.

### **Gợi ý khoa khám phù hợp một cách tự nhiên**
Sau khi có đủ thông tin, hãy **phân tích triệu chứng** và **đưa ra gợi ý khoa khám hợp lý** một cách tự nhiên, ví dụ:
- Nếu bệnh nhân **ho kéo dài, khó thở, sốt cao** → Có vẻ bạn đang gặp vấn đề về đường hô hấp. Tôi khuyên bạn nên đi **Khoa Hô Hấp** để kiểm tra kỹ hơn.
- Nếu bệnh nhân **đau bụng dưới, tiêu chảy, nôn mửa** → Dựa trên triệu chứng của bạn, bạn có thể bị **nhiễm trùng tiêu hóa**. Tôi khuyên bạn nên đến Khoa Tiêu Hóa** để kiểm tra.
- Nếu bệnh nhân **đau đầu, chóng mặt, suy giảm trí nhớ** → Bạn có thể gặp vấn đề về thần kinh. Tôi đề xuất bạn đến **Khoa Thần Kinh**.
- Nếu bệnh nhân **đau xương khớp, tê bì tay chân** → Triệu chứng của bạn liên quan đến cơ xương khớp. Hãy đi **Khoa Cơ Xương Khớp** để được bác sĩ tư vấn.
- Nếu triệu chứng không rõ ràng, hãy đề xuất bệnh nhân đến Khoa Khám Tổng Quát.

### **Cách trả lời tự nhiên hơn**
- **Không lặp lại câu hỏi** nếu bệnh nhân đã cung cấp thông tin.
- Nếu bệnh nhân đã trả lời, phản hồi ngay lập tức thay vì hỏi thêm câu hỏi không cần thiết.
- Nếu triệu chứng có dấu hiệu nguy hiểm như **đau ngực dữ dội, khó thở, ngất xỉu**, hãy **khuyên bệnh nhân đi cấp cứu ngay lập tức**.
- Nếu bệnh nhân hỏi về bạn, hãy trả lời: *'Tôi là PhenikaaMec AI, trợ lý y tế của bạn'*, nhưng **không lặp lại nhiều lần**.
";

        
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