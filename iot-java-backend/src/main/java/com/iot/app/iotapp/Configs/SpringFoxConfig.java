package com.iot.app.iotapp.Configs;

import org.springframework.context.annotation.Bean;
import org.springframework.context.annotation.Configuration;
import springfox.documentation.builders.ApiInfoBuilder;
import springfox.documentation.builders.PathSelectors;
import springfox.documentation.builders.RequestHandlerSelectors;
import springfox.documentation.service.ApiInfo;
import springfox.documentation.service.Contact;
import springfox.documentation.spi.DocumentationType;
import springfox.documentation.spring.web.plugins.Docket;
import springfox.documentation.swagger2.annotations.EnableSwagger2;

@Configuration
@EnableSwagger2
public class SpringFoxConfig {
    private static final String API_VERSION = "1.0";
    private static final String API_TITLE = "Iot API";
    private static final String API_DESCRIPTION = "";
    private static final String LICENSE_TEXT = "API License";
    private static final String LICENSE_URL = "";

    private static final String DEVELOPER_NAME = "Adams Okode";
    private static final String DEVELOPER_URL = "";
    private static final String DEVELOPER_EMAIL = "adamsokode@gmail.com";

    private ApiInfo apiInfo() {
        return new ApiInfoBuilder().version(API_VERSION).title(API_TITLE).description(API_DESCRIPTION)
                .license(LICENSE_TEXT).licenseUrl(LICENSE_URL)
                .contact(new Contact(DEVELOPER_NAME, DEVELOPER_URL, DEVELOPER_EMAIL)).build();
    }

    @Bean
    public Docket api() {
        return new Docket(DocumentationType.SPRING_WEB).select()

                .apis(RequestHandlerSelectors.basePackage("com.iot.app.iotapp.Controllers")).paths(PathSelectors.any())
                .build().apiInfo(apiInfo())
                .pathMapping("/");

    }
}