<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomePageCardController;
use App\Http\Controllers\ContactBranchDetailsController;
use App\Http\Controllers\ChairmanSpeechController;
use App\Http\Controllers\BankProfileController;
use App\Http\Controllers\SavingAccountDocController;
use App\Http\Controllers\CurrentAccReqDocController;
use App\Http\Controllers\TermDepositController;
use App\Http\Controllers\CashCreditLoanController;
use App\Http\Controllers\LockerController;
use App\Http\Controllers\ServiceChargeController;
use App\Http\Controllers\DepositInterestRateController;
use App\Http\Controllers\GoldLoanController;
use App\Http\Controllers\HolidayHomeController;
use App\Http\Controllers\UpiController;
use App\Http\Controllers\ImpsController;
use App\Http\Controllers\MortgageLoanController;
use App\Http\Controllers\OpenedSavingAccountController;
use App\Http\Controllers\LoanInterestRatesController;
use App\Http\Controllers\HouseBuildingLoanController;
use App\Http\Controllers\BusinessWithUrbanCooperativeBankController;
use App\Http\Controllers\RegDevUrbanCoOpRBIController;
use App\Http\Controllers\CustomerAwarenessController;
use App\Http\Controllers\DebitCardController;
use App\Http\Controllers\DailyDepositController;
use App\Http\Controllers\PrivacyPolicyController;
use App\Http\Controllers\EmiCalculatorController;
use App\Http\Controllers\HolidayHomeDescController;
use App\Http\Controllers\OpenFeedBackFormController;
use App\Http\Controllers\AuditReportController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\MobileBankingController;
use App\Http\Controllers\LoanTypeTakenController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\NeftRtgsController;
use App\Http\Controllers\NoticeTitleController;

Route::get('/home-page-cards', [HomePageCardController::class, 'index']);
Route::get('/contact-branch-page-cards', [ContactBranchDetailsController::class, 'index']);
Route::get('/chairman-speech', [ChairmanSpeechController::class, 'index']);
Route::get('/bank-profile', [BankProfileController::class, 'index']);
Route::get('/saving-acc-req-doc', [SavingAccountDocController::class, 'index']);
Route::post(
    '/open-saving-account',
    [OpenedSavingAccountController::class, 'store']
);
Route::get('/opened-savings-accs', [OpenedSavingAccountController::class, 'OpenedSavingsAccs']);
Route::put('/update-saving-account/{id}', 
    [OpenedSavingAccountController::class, 'update']
);

// ++++++++++++++++++++++++ code added by Anirban Ghosh on 18th July,2026 +++++++++++++++++++++++++++++ \\
Route::delete(
    '/delete-savings-account/{id}',
    [OpenedSavingAccountController::class, 'destroy']
);
Route::get('/export-saving-account', [OpenedSavingAccountController::class, 'export']);

Route::get('/valid-req-doc', [SavingAccountDocController::class, 'validDocs']);
Route::get('/current-acc-req-doc', [CurrentAccReqDocController::class, 'index']);
Route::post(
    '/open-current-account',
    [CurrentAccReqDocController::class, 'store']
);
Route::put('/update-current-account/{id}', 
    [CurrentAccReqDocController::class, 'update']
);

// +++++++++++++++++++++++++++ code added by Anirban Ghosh on 18th July,2026 ++++++++++++++++++++++++++ \\
Route::delete(
    '/delete-current-account/{id}',
    [CurrentAccReqDocController::class, 'destroy']
);
Route::get('/export-current-account', [CurrentAccReqDocController::class, 'export']);
Route::get('/opened-current-accs', [CurrentAccReqDocController::class, 'getOpenedCurrentAccounts']);

Route::get('/term-acc-req-doc', [TermDepositController::class, 'index']);
Route::post(
    '/open-term-deposit',
    [TermDepositController::class, 'store']
);

// +++++++++++++++++++++++++++ code added by Anirban Ghosh on 18th July,2026 ++++++++++++++++++++++++++++++++ \\

Route::get(
    '/opened-term-accs',
    [TermDepositController::class, 'getOpenedTermAccounts']
);
Route::put('/update-term-account/{id}', 
    [TermDepositController::class, 'update']
);
Route::delete(
    '/delete-term-account/{id}',
    [TermDepositController::class, 'destroy']
);

// +++++++++++++++++++++++++ code added by Anirban Ghosh on 19th July,2026 +++++++++++++++++++++++++++++++++++ \\
Route::get('/export-term-account', [TermDepositController::class, 'export']);


Route::get('/cash-credit-loan', [CashCreditLoanController::class, 'index']);
Route::post(
    '/open-cash-credit-account',
    [CashCreditLoanController::class, 'store']
);

// ++++++++++++++++++++++++ route added on 7th July,2026 ++++++++++++++++++++++++++++++++++ \\
Route::get('/opened-cash-credit-accs', [CashCreditLoanController::class, 'openedCashCreditAcc']);
Route::put('/update-cash-credit-account/{id}', 
    [CashCreditLoanController::class, 'update']
);
// +++++++++++++++++++++++++ route added on 19th July,2026 by Anirban Ghosh ++++++++++++++++++++++++++++++ \\
Route::delete(
    '/delete-cash-credit-account/{id}',
    [CashCreditLoanController::class, 'destroy']
);
Route::get('/export-cash_credit-account', [CashCreditLoanController::class, 'export']);

Route::get('/locker-features', [LockerController::class, 'index']);
Route::post(
    '/open-locker-account',
    [LockerController::class, 'store']
);



// ++++++++++++++++++++++++ route added on 7th July,2026 ++++++++++++++++++++++++++++++++++ \\
Route::get('/opened-locker-accounts', [LockerController::class, 'openedLockerAccounts']);
Route::put('/update-locker-account/{id}', 
    [LockerController::class, 'update']
);

// ++++++++++++++++++++++++ route added on 18th July,2026 ++++++++++++++++++++++++++++++++++ \\
Route::delete(
    '/delete-locker-account/{id}',
    [LockerController::class, 'destroy']
);
Route::get('/export-locker-account', [LockerController::class, 'export']);
// ++++++++++++++++++++++++ code addition ends here +++++++++++++++++++++++++++++++++++++++ \\

Route::get('/service-charge-details', [ServiceChargeController::class, 'index']);
Route::get('/deposit-interest-rates', [DepositInterestRateController::class, 'index']);
Route::get('/cash-certificate-notes', [DepositInterestRateController::class, 'getCashCertificatesNotes']);
Route::put(
    '/cash-certificate/{id}',
    [DepositInterestRateController::class,'update']
);
Route::put(
    '/update-deposit-interest-rates/{id}',
    [DepositInterestRateController::class,'updateDeposit']
);

Route::delete(
    '/cash-certificate/{id}',
    [DepositInterestRateController::class,'destroy']);

    Route::delete(
    '/deposit-interest-rate/{id}',
    [DepositInterestRateController::class, 'destroyDeposit']
);


Route::get('/gold-loan-terms', [GoldLoanController::class, 'index']);
Route::post(
    '/open-gold-loan',
    [GoldLoanController::class, 'store']
);

// ++++++++++++++++++++++++++++++ code added by Anirban Ghosh on 8th July,2026 +++++++++++++++++++++++++++++ \\
Route::get('/opened-gold-loan-accs', [GoldLoanController::class, 'openedGoldLoanAcc']);
Route::put('/update-gold-loan-account/{id}', 
    [GoldLoanController::class, 'update']
); 
// ++++++++++++++++++++++++++++++++ code added by Anirban Ghosh on 19th July,2026 +++++++++++++++++++++++++++++++ \\
Route::delete(
    '/delete-gold-loan-account/{id}',
    [GoldLoanController::class, 'destroy']
);
Route::get('/export-gold-loan-account', [GoldLoanController::class, 'export']);


Route::get('/holiday-home-details', [HolidayHomeController::class, 'index']);
Route::post(
    '/book-holiday-home',
    [HolidayHomeController::class, 'store']
);

// ++++++++++++++++++++++ code added by Anirban Ghosh on 10th July,2026 +++++++++++++++++++++++++++++ \\
Route::get('/booked-holiday-homes', [HolidayHomeController::class, 'getBookedHolidayHomeDetails']);
Route::put('/update-booked-holiday-home-details/{id}', 
    [HolidayHomeController::class, 'update']
); 


Route::get('/upi-details', [UpiController::class, 'index']);
Route::get('/imps-features', [ImpsController::class, 'index']);
Route::get('/neft-rtgs-features', [ImpsController::class, 'index']);
Route::get('/mortgage-features', [MortgageLoanController::class, 'index']);
Route::post('/open-mortgage-account', [MortgageLoanController::class, 'store']);

// ++++++++++++++++++++++++ code added by Anirban Ghosh on 14th July,2026 +++++++++++++++++++++++++++++ \\
Route::get('/opened-mortgage-loan', [MortgageLoanController::class, 'getOpenedMortgageLoanAccounts']);
Route::put('/update-mortgage-loan-account/{id}', 
    [MortgageLoanController::class, 'update']
);
// ++++++++++++++++++++++++++++++++ code added by Anirban Ghosh on 19th July,2026 +++++++++++++++++++++++++++++++ \\
Route::delete(
    '/delete-mortgage-loan-account/{id}',
    [MortgageLoanController::class, 'destroy']
);
Route::get('/export-mortgage-loan-account', [MortgageLoanController::class, 'export']);

// ++++++++++++++++++++++++ code addition ends ++++++++++++++++++++++++++++++++++++++ \\
Route::get('/loan-interest-rates', [LoanInterestRatesController::class, 'index']);
// ++++++++++++++++++++++++ code added by Anirban Ghosh on 22nd July,2026 ++++++++++++++++++++++++ \\
Route::put('/update-loan-interest-rates/{id}', 
    [LoanInterestRatesController::class, 'updateLoanInterestRates']
);
Route::delete(
    '/delete-loan-interest-rate/{id}',
    [LoanInterestRatesController::class, 'destroy']);

// +++++++++++++++++++++ route added for house building loan on 30th June,2026 by Anirban Ghosh ++++++++++++++++ \\
Route::get('/housing-loan-det', [HouseBuildingLoanController::class, 'index']);
Route::post('/apply-house-building-loan', [HouseBuildingLoanController::class, 'store']);
Route::get('/opened-housing-loan', [HouseBuildingLoanController::class, 'openedHouseBuildingLoanAcc']);
Route::put('/update-home-loan-account/{id}', 
    [HouseBuildingLoanController::class, 'update']
);
// ++++++++++++++++++++++++++++++++ code added by Anirban Ghosh on 19th July,2026 +++++++++++++++++++++++++++++++ \\
Route::delete(
    '/delete-house-building-loan-account/{id}',
    [HouseBuildingLoanController::class, 'destroy']
);
Route::get('/export-house-building-loan-account', [HouseBuildingLoanController::class, 'export']);

Route::get('/business-with-urban-co-op-bank', [BusinessWithUrbanCooperativeBankController::class, 'index']);



Route::get('/reg-dev-data', [RegDevUrbanCoOpRBIController::class, 'index']);
Route::get('/cust-awareness-data', [CustomerAwarenessController::class, 'index']);

// ++++++++++++++++++++++++++++ route added for debit card page on 2nd July,2026 by Anirban Ghosh ++++++++++++++++++++++ \\

Route::get('/debit-card-features', [DebitCardController::class, 'index']);
Route::post('/apply-debit-card', [DebitCardController::class, 'store']);
Route::get('/opened-debit-cards', [DebitCardController::class, 'openedDebitCards']);
Route::put('/update-opened-debit-cards/{id}', 
    [DebitCardController::class, 'update']
);
// +++++++++++++++++++++++++++ code added by Anirban Ghosh on 18th July,2026 ++++++++++++++++++++++++++ \\
Route::delete(
    '/delete-opened-debit-card-account/{id}',
    [DebitCardController::class, 'destroy']
);





Route::get('/daily-dep-desc', [DailyDepositController::class, 'index']);
Route::post('/open-daily-deposit', [DailyDepositController::class, 'store']);
// ++++++++++++++++++++++++++++ code added by Anirban Ghosh on 19th July,2026 ++++++++++++++++++++++++++++++++++= \\
Route::get('/export-daily-deposit-account', [DailyDepositController::class, 'export']);
Route::delete(
    '/delete-daily-deposit-account/{id}',
    [DailyDepositController::class, 'destroy']
);

// ++++++++++++++++++++++++++++ route added for debit card page on 3rd July,2026 by Anirban Ghosh ++++++++++++++++++++++ \\

Route::get('/privacy-policy', [PrivacyPolicyController::class, 'index']);

// ++++++++++++++++++++++++++++ route added on 4th July,2026 by Anirban Ghosh +++++++++++++++++++++++++++++++++++++++++++ \\


Route::get('/emi-calculator-det', [EmiCalculatorController::class, 'index']);

// ++++++++++++++++++++++++++++++++ code added on 5th july by Anirban Ghosh +++++++++++++++++++++++++++++++++++ \\

Route::get('/holliday-home-desc', [HolidayHomeDescController::class, 'holidayHomeDesc']);
Route::post('/open-feedback-form', [OpenFeedBackFormController::class, 'store']);

// ++++++++++++++++++++ code added on 8th July by Anirban Ghosh +++++++++++++++++++++++++++++++ \\
// Route::get('/audit-reports', [AuditReportController::class, 'index']);
Route::post(
'/upload-audit-report',
[AuditReportController::class,'upload']
);

// ++++++++++++++++++++++++++++++++++ route added on 14th July,2026 +++++++++++++++++++++++++++++++++++++ \\



Route::post('/feedback', [FeedbackController::class, 'store']);
Route::get('/given-feedback-accs', [FeedbackController::class, 'index']);

Route::put('/update-feedback-account/{id}', 
    [FeedbackController::class, 'update']
);




Route::get('/opened-daily-deposits', [DailyDepositController::class, 'getOpenedDailyDepositAccounts']);

Route::put('/update-daily-deposit-account/{id}', 
    [DailyDepositController::class, 'update']
);

// +++++++++++++++++++++++++++++ code added on 15th July,2026 by Anirban Ghosh +++++++++++++++++++++++++++++++++++ \\



Route::post('/complaints',[ComplaintController::class,'store']);
// +++++++++++++++++++++++++++++ code added on 16th July,2026 by Anirban Ghosh +++++++++++++++++++++++++++++++++++ \\
Route::get('/applied-complaint-det',[ComplaintController::class,'getAppliedComplaintDetails']);
Route::put('/update-complaint-det/{id}', 
    [ComplaintController::class, 'updateComplaintForm']
);

// ++++++++++++++++++++++++++ code added by Anirban Ghosh on 17th July,2026 +++++++++++++++++++++++++++++++++ \\
Route::get('/mobile-banking-features', [MobileBankingController::class, 'index']);
Route::post(
    '/apply-mobile-banking',
    [MobileBankingController::class, 'store']
);
Route::get('/applied-mobile-banking-accs', [MobileBankingController::class, 'getMobileBankingFeatures']);
Route::put('/update-mobile-banking-account/{id}', 
    [MobileBankingController::class, 'update']
);
// ++++++++++++++++++++++++++++ code added by Anirban Ghosh on 18th July,2026 +++++++++++++++++++++++++++++++++ \\
Route::delete(
    '/delete-applied-mobile-banking-account/{id}',
    [MobileBankingController::class, 'destroy']
);
Route::get('/export-mobile-banking', [MobileBankingController::class, 'export']);
Route::post(
    '/open-loan-account',
    [LoanTypeTakenController::class, 'store']
);
Route::get('/opened-loan-taken-accounts', [LoanTypeTakenController::class, 'getOpenedLoanTakenAccounts']);
Route::put('/update-loan-taken-account/{id}', 
    [LoanTypeTakenController::class, 'update']
);

// ++++++++++++++++++++++++++++++ code added by Anirban Ghosh on 24.07.2026 ++++++++++++++++++++++++++++++ \\




Route::post(
    '/admin/login',
    [AdminController::class,'login']
);



Route::post(
    '/admin/change-password',
    [AdminController::class,'changePassword']
);

// +++++++++++++++++++++++++++ code added by Anirban Ghosh on 24.07.2024 +++++++++++++++++++++++++++++++++++ \\

Route::get('/get-neft-rtgs-desc', [NeftRtgsController::class, 'getNeftRtgsDescripson']);

// +++++++++++++++++++++++++++ code added by Anirban Ghosh on 25.07.2025 +++++++++++++++++++++++++++++++++++ \\

Route::get('/get-notice-title-desc', [NoticeTitleController::class, 'getNoticeTitleDescriptions']);
Route::put('/update-notice-title/{id}', 
    [NoticeTitleController::class, 'update']
);